<?php
namespace App\Imports;

use App\Services\ProductImportService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class ProductDataImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $data) {
          
            $uniqueId = substr(Str::uuid()->toString(), 0, 8);
            $slug = Str::slug($data['product_name']) . '-' . $uniqueId;
            $title = $data['product_name'];
            
            $row = new Collection([
                'sku' => '',
                'name' => $data['product_name'],
                'quantity' => $data['quantity'],
                'description' => $data['description'],
                'slug' => $slug,
                'price' => $data['purchase_price'],
                'sale_price' => $data['sell_price'],
                'status' => $data['status'],
                'short_description' => $data['short_description'],
                'weight' => $this->getWeightFromTitle($title),
                'dimensions' => $data['dimension'],
            ]);
            dd($row);
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