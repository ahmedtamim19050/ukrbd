<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Shop;
use App\Models\Prodcat;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class ProductUpdateService
{
    protected $shop;

    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * Update all products for the shop
     */
    public function updateAllProducts()
    {
        $products = Product::where('shop_id', $this->shop->id)->get();
        
        Log::info("Starting update for {$products->count()} products in shop {$this->shop->id}");
        
        $updated = 0;
        $errors = 0;

        foreach ($products as $product) {
            try {
                $this->updateProduct($product);
                $updated++;
                Log::info("Updated product: {$product->name} (SKU: {$product->sku})");
            } catch (Exception $e) {
                $errors++;
                Log::error("Failed to update product {$product->sku}: " . $e->getMessage());
            }
        }

        Log::info("Product update completed. Updated: {$updated}, Errors: {$errors}");
        
        return [
            'updated' => $updated,
            'errors' => $errors,
            'total' => $products->count()
        ];
    }

    /**
     * Update a single product
     */
    public function updateProduct(Product $product)
    {
        try {
            // Search for updated product data
            $searchData = [
                "apiKey" => "e964fc2d51064efa97e94db7c64bf3d044279d4ed0ad4bdd9dce89fecc9156f0",
                "storeId" => 1,
                "warehouseId" => 8,
                "pageSize" => 100,
                "currentPageIndex" => 0,
                "metropolitanAreaId" => 1,
                "query" => $this->removeWeightFromTitle($product->name),
                "productVariantId" => -1,
                "bundleId" => ["case" => "None"],
                "canSeeOutOfStock" => "true",
                "filters" => [],
                "maxOutOfStockCount" => ["case" => "Some", "fields" => [5]],
                "shouldShowAlternateProductsForAllOutOfStock" => ["case" => "Some", "fields" => [true]],
                "customerGuid" => ["case" => "None"]
            ];

            $response = Http::post('https://catalog.chaldal.com/searchOld', $searchData);
            

            if (!$response->successful()) {
                throw new Exception("API request failed with status: " . $response->status());
            }

            $searchResults = $response->json()['hits'] ?? [];

            if (empty($searchResults)) {
                Log::warning("No search results found for product: {$product->name}");
                return false;
            }

            // Find the most similar product
            $bestMatch = $this->findMostSimilarSimilarText($product->name, $searchResults, $product->price);
            
            if (!$bestMatch) {
                Log::warning("No suitable match found for product: {$product->name}");
                return false;
            }

            // Update product with new data
            $updateData = [
                'description' => $bestMatch['longDesc'] ?? $product->description,
                'short_description' => $bestMatch['shortDesc'] ?? $product->short_description,
                'weight' => $product->weight ?? $this->getWeightFromTitle($product->name),
            ];

            // Update images if available
            if (!empty($bestMatch['picturesUrls'])) {
                $images = $this->getImages($bestMatch['picturesUrls']);
                if (!empty($images)) {
                    $updateData['image'] = $images[0];
                    $updateData['images'] = json_encode($images);
                }
            }

            // Update price if available
            if (isset($bestMatch['price'])) {
                $updateData['price'] = $bestMatch['price'];
            }

            $product->update($updateData);
            
            return true;

        } catch (Exception $e) {
            Log::error("Error updating product {$product->sku}: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Find the most similar product using similar_text
     */
    /**
     * Find the most similar product using similar_text and also consider closest price match.
     * @param string $string
     * @param array $array
     * @param float|null $productPrice (optional) - If available, use to help match by price
     * @return array|null
     */
    protected function findMostSimilarSimilarText($string, $array, $productPrice = null)
    {
        $bestScore = 0;
        $closest = null;

        foreach ($array as $key => $value) {
            $nameToCompare = $value['nameWithoutSubText'] ?? $value['name'] ?? '';
            similar_text($string, $nameToCompare, $percent);

            // If price is available, factor in price similarity
            $apiPrice = isset($value['price']) ? floatval($value['price']) : null;
            $priceScore = 0;

            if ($productPrice !== null && $apiPrice !== null && $apiPrice > 0) {
                // Calculate price similarity as a percentage (closer is better)
                $priceDiff = abs($productPrice - $apiPrice);
                $pricePercent = 100 - min(100, ($priceDiff / max($productPrice, $apiPrice)) * 100);
                $priceScore = $pricePercent;
            }

            // Weighted score: prioritize name match, but add price similarity if available
            $score = $percent;
            if ($priceScore > 0) {
                // You can adjust the weights as needed (e.g., 70% name, 30% price)
                $score = ($percent * 0.7) + ($priceScore * 0.3);
            }

            if ($score > $bestScore) {
                $bestScore = $score;
                $closest = $value;
            }
        }

        return $closest;
    }

    /**
     * Extract weight from product title
     */
    protected function getWeightFromTitle($title)
    {
        preg_match('/(\d+\s*(?:gm|ML|kg|litter))/i', $title, $matches);

        if (!empty($matches)) {
            $weight = str_replace(' ', '', $matches[1]);
            if (preg_match('/(\d+\.?\d*)(\D+)/', $weight, $matches)) {
                if (in_array($matches[2], ['KG', 'kg', 'liter', 'Liter'])) {
                    return $matches[1] * 1000;
                } else {
                    return $matches[1];
                }
            }
            return $weight;
        } else {
            return null;
        }
    }

    /**
     * Remove weight information from title for search
     */
    protected function removeWeightFromTitle($title)
    {
        $pattern = '/(\d+\s*(?:gm|ML|kg|litter))/i';
        $modifiedTitle = preg_replace($pattern, '', $title);
        $modifiedTitle = trim($modifiedTitle);
        return $modifiedTitle;
    }

    /**
     * Download and store product images
     */
    private function getImages($images)
    {
        $data = [];

        foreach ($images as $image) {
            try {
                $imageContents = file_get_contents($image);
                if ($imageContents === false) {
                    Log::warning("Failed to download image: {$image}");
                    continue;
                }
                
                $imageName = Str::random(10) . '.jpg';
                $path = 'products/' . $imageName;
                Storage::put($path, $imageContents);
                $data[] = $path;
            } catch (Exception $e) {
                Log::warning("Error processing image {$image}: " . $e->getMessage());
                continue;
            }
        }
        
        return $data;
    }

    /**
     * Update products by category
     */
    public function updateProductsByCategory($categoryId)
    {
        $products = Product::where('shop_id', $this->shop->id)
            ->whereHas('prodcats', function($query) use ($categoryId) {
                $query->where('prodcat_id', $categoryId);
            })
            ->get();

        Log::info("Updating {$products->count()} products in category {$categoryId} for shop {$this->shop->id}");

        $updated = 0;
        $errors = 0;

        foreach ($products as $product) {
            try {
                $this->updateProduct($product);
                $updated++;
            } catch (Exception $e) {
                $errors++;
                Log::error("Failed to update product {$product->sku}: " . $e->getMessage());
            }
        }

        return [
            'updated' => $updated,
            'errors' => $errors,
            'total' => $products->count()
        ];
    }

    /**
     * Update a specific product by SKU
     */
    public function updateProductBySku($sku)
    {
        $product = Product::where('shop_id', $this->shop->id)
            ->where('sku', $sku)
            ->first();

        if (!$product) {
            throw new Exception("Product with SKU {$sku} not found in shop {$this->shop->id}");
        }

        $this->updateProduct($product);
        return $product;
    }
}
