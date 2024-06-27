<?php

namespace App\Imports;

use App\Services\ProductImportService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductDataImport implements ToCollection, WithHeadingRow
{

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
    
        foreach ($collection as $data) {
            $row = [
                'sku'=>'',
                'name' => $data['name'],
                'quantity' => $data['quantity'],
                'description' =>$data['description'],
                'slug' => $data['slug'],
                'price' => $data['price'],
                'sale_price' => $data['sale_price'],
                'status' => $data['status'],
                'short_description' => $data['short_description'],
                'weight' => $this->$data['weight'],
                'dimensions' => $data['dimension'],
            ]
            (new ProductImportService($row))->import();
        }
    }

    protected function getWeightFromTitle($title)
    {
        preg_match('/(\d+\s*(?:gm|ML|kg|litter))/i', $title, $matches);

        if (!empty($matches)) {
            $weight = $matches[1];
            return $weight;
        } else {
            return 'N/A';

        }
    }
}
