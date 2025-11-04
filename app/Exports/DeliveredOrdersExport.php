<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class DeliveredOrdersExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    protected $fromDate;
    protected $toDate;

    public function __construct($fromDate = null, $toDate = null)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Get all delivered orders (status = 4) for the current vendor's shop
        $query = Order::whereNotNull('parent_id')
            ->where('shop_id', auth()->user()->shop->id)
            ->where('status', 4)
            ->with('product');

        // Apply date filters
        if ($this->fromDate) {
            $query->whereDate('created_at', '>=', $this->fromDate);
        }
        if ($this->toDate) {
            $query->whereDate('created_at', '<=', $this->toDate);
        }

        $orders = $query->latest()->get();

        // Add index to each order for SL numbering
        return $orders->map(function ($order, $index) {
            $order->sl_number = $index + 1;
            return $order;
        });
    }

    /**
     * Map each order to a row
     */
    public function map($order): array
    {
        return [
            $order->sl_number ?? 0, // SL (Serial Number)
            $order->created_at->format('Y-m-d'),
            $order->product ? $order->product->name : 'N/A',
            $order->quantity,
            $order->product_price ?? ($order->product ? ($order->product->sale_price > 0 ? $order->product->sale_price : $order->product->price) : 0),
            $order->total,
        ];
    }

    /**
     * Define the headings
     */
    public function headings(): array
    {
        return [
            'SL',
            'Date',
            'Product Name',
            'Qty',
            'Price',
            'Total Price',
        ];
    }

    /**
     * Register events to add custom header
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $shopName = auth()->user()->shop->name ?? 'N/A';
                
                // Get the highest row number
                $highestRow = $sheet->getHighestRow();
                
                // Insert 3 rows at the beginning
                $sheet->insertNewRowBefore(1, 3);
                
                // Set title "Sales Report"
                $sheet->setCellValue('A1', 'Sales Report');
                $sheet->mergeCells('A1:F1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Set shop name
                $sheet->setCellValue('A2', 'Shop: ' . $shopName);
                $sheet->mergeCells('A2:F2');
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Set date range if filters are applied
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
                    $sheet->mergeCells('A3:F3');
                    $sheet->getStyle('A3')->applyFromArray([
                        'font' => [
                            'size' => 11,
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER,
                            'vertical' => Alignment::VERTICAL_CENTER,
                        ],
                    ]);
                }

                // Style the header row (row 4 - column headers, which were originally row 1)
                $sheet->getStyle('A4:F4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'E7E6E6'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Auto-size columns
                foreach (range('A', 'F') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }

                // Set row height for header rows
                $sheet->getRowDimension('1')->setRowHeight(25);
                $sheet->getRowDimension('2')->setRowHeight(20);
                if ($dateRange) {
                    $sheet->getRowDimension('3')->setRowHeight(20);
                }
                $sheet->getRowDimension('4')->setRowHeight(20);
            },
        ];
    }
}
