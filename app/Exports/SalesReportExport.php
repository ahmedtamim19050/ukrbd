<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class SalesReportExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    protected $fromDate;
    protected $toDate;
    /** @var \Illuminate\Support\Collection */
    protected $rows;

    public function __construct($fromDate = null, $toDate = null)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->rows = new Collection();
    }

    public function collection()
    {
        $shopId = auth()->user()->shop->id;

        $query = Order::whereNotNull('parent_id')
            ->where('shop_id', $shopId)
            ->where('status', 4) // delivered / completed
            ->with(['product', 'parent']);

        if ($this->fromDate) {
            $query->whereDate('created_at', '>=', $this->fromDate);
        }
        if ($this->toDate) {
            $query->whereDate('created_at', '<=', $this->toDate);
        }

        $orders = $query->get();

        if ($orders->isEmpty()) {
            return $this->rows;
        }

        // Preload latest purchase cost per product for this shop
        $productIds = $orders->pluck('product_id')->filter()->unique();
        $purchaseCosts = Purchase::where('shop_id', $shopId)
            ->whereIn('product_id', $productIds)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('product_id')
            ->map(function ($group) {
                // latest purchase cost_price
                return (float) ($group->first()->cost_price ?? 0);
            });

       
        $grouped = $orders->groupBy('parent_id');

        $index = 0;
        $totalSell = 0;
        $totalPurchase = 0;
        $totalProfit = 0;

        foreach ($grouped as $parentId => $group) {
            /** @var \App\Models\Order $first */
            $first = $group->first();

            $sellTotal = $group->sum('total');

            $purchaseTotal = 0;
            foreach ($group as $child) {
                // Prefer latest purchase cost; if not available, fallback to product vendor_price
                $costPerUnit = $purchaseCosts->get($child->product_id);
                if ($costPerUnit === null) {
                    $costPerUnit = (float) optional($child->product)->vendor_price ?? 0.0;
                }
                $purchaseTotal += (float) $child->quantity * $costPerUnit;
            }

            $profit = $sellTotal - $purchaseTotal;
            $margin = $sellTotal > 0 ? round(($profit / $sellTotal) * 100, 2) : 0;

            $totalSell += $sellTotal;
            $totalPurchase += $purchaseTotal;
            $totalProfit += $profit;

            $index++;

            $this->rows->push((object) [
                'sl' => $index,
                'invoice_id' => optional($first->parent)->id ?? $parentId,
                'date' => optional($first->parent)->created_at ?? $first->created_at,
                'sell_total' => (float) $sellTotal,
                'purchase_total' => (float) $purchaseTotal,
                'profit' => (float) $profit,
                'margin' => (float) $margin,
            ]);
        }

        // Grand total row
        $totalMargin = $totalSell > 0 ? round(($totalProfit / $totalSell) * 100, 2) : 0;
        $this->rows->push((object) [
            'sl' => '',
            'invoice_id' => 'TOTAL',
            'date' => null,
            'sell_total' => (float) $totalSell,
            'purchase_total' => (float) $totalPurchase,
            'profit' => (float) $totalProfit,
            'margin' => (float) $totalMargin,
        ]);

        return $this->rows;
    }

    public function map($row): array
    {
        // Format total row
        if ($row->invoice_id === 'TOTAL') {
            return [
                '',
                'TOTAL',
                '',
                (float) ($row->sell_total ?? 0),
                (float) ($row->purchase_total ?? 0),
                (float) ($row->profit ?? 0),
                (float) ($row->margin ?? 0),
            ];
        }

        return [
            $row->sl,
            $row->invoice_id,
            $row->date ? $row->date->format('Y-m-d') : '',
            (float) ($row->sell_total ?? 0),
            (float) ($row->purchase_total ?? 0),
            (float) ($row->profit ?? 0),
            (float) ($row->margin ?? 0), // percentage
        ];
    }

    public function headings(): array
    {
        return [
            'SL',
            'Invoice ID',
            'Date',
            'Sell Price',
            'Purchase Price',
            'Profit',
            'Profit Margin (%)',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Insert header rows
                $sheet->insertNewRowBefore(1, 3);

                $sheet->setCellValue('A1', 'Sales Report');
                $sheet->mergeCells('A1:G1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $shopName = auth()->user()->shop->name ?? 'N/A';
                $sheet->setCellValue('A2', 'Shop: ' . $shopName);
                $sheet->mergeCells('A2:G2');
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 12],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $dateRange = '';
                if ($this->fromDate && $this->toDate) {
                    $dateRange = 'Period: ' . $this->fromDate . ' to ' . $this->toDate;
                } elseif ($this->fromDate) {
                    $dateRange = 'From: ' . $this->fromDate;
                } elseif ($this->toDate) {
                    $dateRange = 'Until: ' . $this->toDate;
                }

                if ($dateRange) {
                    $sheet->setCellValue('A3', $dateRange);
                    $sheet->mergeCells('A3:G3');
                    $sheet->getStyle('A3')->applyFromArray([
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER,
                            'vertical' => Alignment::VERTICAL_CENTER,
                        ],
                    ]);
                }

                // Style headings row (row 4 after inserts)
                $sheet->getStyle('A4:G4')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'E7E6E6'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                foreach (range('A', 'G') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            },
        ];
    }
}


