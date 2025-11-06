<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class PurchasesExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    protected $fromDate;
    protected $toDate;

    public function __construct($fromDate = null, $toDate = null)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    public function collection()
    {
        $query = Purchase::where('shop_id', auth()->user()->shop->id)->with('product');
        if ($this->fromDate) {
            $query->whereDate('created_at', '>=', $this->fromDate);
        }
        if ($this->toDate) {
            $query->whereDate('created_at', '<=', $this->toDate);
        }
        return $query->latest()->get()->values()->each(function ($purchase, $index) {
            $purchase->sl_number = $index + 1;
        });
    }

    public function map($purchase): array
    {
        return [
            $purchase->sl_number ?? 0,
            $purchase->created_at->format('Y-m-d'),
            optional($purchase->product)->name,
            (float) $purchase->quantity,
            (float) ($purchase->cost_price ?? 0),
            (float) ($purchase->quantity * ($purchase->cost_price ?? 0)),
            $purchase->reference,
            $purchase->note,
        ];
    }

    public function headings(): array
    {
        return [
            'SL', 'Date', 'Product', 'Qty', 'Cost Price', 'Line Cost', 'Reference', 'Note',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Insert header rows
                $sheet->insertNewRowBefore(1, 3);

                $sheet->setCellValue('A1', 'Purchase Report');
                $sheet->mergeCells('A1:H1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                ]);

                $shopName = auth()->user()->shop->name ?? 'N/A';
                $sheet->setCellValue('A2', 'Shop: ' . $shopName);
                $sheet->mergeCells('A2:H2');
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 12],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
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
                    $sheet->mergeCells('A3:H3');
                    $sheet->getStyle('A3')->applyFromArray([
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                    ]);
                }

                // Style column headings (row 4 after insert)
                $sheet->getStyle('A4:H4')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'E7E6E6']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                ]);

                foreach (range('A', 'H') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }
}


