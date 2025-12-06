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

        $query = Order::whereNull('parent_id')
            ->where('status', 4) // delivered / completed
            ->with(['product']);

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

        $grouped = $orders;


        $index = 0;
        $totalSubtotal = 0;
        $totalSell = 0;
        $totalPurchase = 0;
        $totalProfit = 0;
        $totalDiscount = 0;

       
        foreach ($grouped as  $group) {
            
            $sellTotal = $group->total; // Net sell after discount
            $discount = (float) $group->discount;
            $subtotal = (float) $group->subtotal; // Subtotal from database

            $purchaseTotal = 0;
            foreach ($group->childs as $child) {
                $purchaseTotal += (float) $child->quantity * (float) $child->product->vendor_price;
            }


            $profit = $sellTotal - $purchaseTotal;
            $margin = $sellTotal > 0 ? round(($profit / $sellTotal) * 100, 2) : 0;

            $totalSubtotal += $subtotal;
            $totalSell += $sellTotal;
            $totalPurchase += $purchaseTotal;
            $totalProfit += $profit;
            $totalDiscount += $discount;

            $index++;

            $this->rows->push((object) [
                'sl' => $index,
                'invoice_id' => $group->id,
                'customer_name' => $group->full_name ?? '',
                'date' => $group->created_at,
                'subtotal' => (float) $subtotal,
                'discount' => (float) $discount,
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
            'customer_name' => '',
            'date' => null,
            'subtotal' => (float) $totalSubtotal,
            'discount' => (float) $totalDiscount,
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
                '',
                (float) ($row->subtotal ?? 0),
                (float) ($row->discount ?? 0),
                (float) ($row->sell_total ?? 0),
                (float) ($row->purchase_total ?? 0),
                (float) ($row->profit ?? 0),
                (float) ($row->margin ?? 0),
            ];
        }

        return [
            $row->sl,
            $row->invoice_id,
            $row->customer_name ?? '',
            $row->date ? $row->date->format('Y-m-d') : '',
            (float) ($row->subtotal ?? 0),
            (float) ($row->discount ?? 0),
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
            'Customer Name',
            'Date',
            'Subtotal',
            'Discount',
            'Net total',
            'Purchase total',
            'Profit total',
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
                $sheet->mergeCells('A1:J1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $shopName = auth()->user()->shop->name ?? 'N/A';
                $sheet->setCellValue('A2', 'Shop: ' . $shopName);
                $sheet->mergeCells('A2:J2');
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
                    $sheet->mergeCells('A3:J3');
                    $sheet->getStyle('A3')->applyFromArray([
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER,
                            'vertical' => Alignment::VERTICAL_CENTER,
                        ],
                    ]);
                }

                // Style headings row (row 4 after inserts)
                $sheet->getStyle('A4:J4')->applyFromArray([
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

                foreach (range('A', 'J') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            },
        ];
    }
}
