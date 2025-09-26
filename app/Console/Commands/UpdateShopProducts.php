<?php

namespace App\Console\Commands;

use App\Models\Shop;
use App\Services\ProductUpdateService;
use Illuminate\Console\Command;
use Exception;

class UpdateShopProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update 
                            {shop_id : The ID of the shop to update products for}
                            {--sku= : Update a specific product by SKU}
                            {--category= : Update products in a specific category}
                            {--force : Force update without confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update shop products details using external API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $shopId = $this->argument('shop_id');
        $sku = $this->option('sku');
        $categoryId = $this->option('category');
        $force = $this->option('force');

        // Validate shop exists
        $shop = Shop::find($shopId);
        if (!$shop) {
            $this->error("Shop with ID {$shopId} not found.");
            return 1;
        }

        $this->info("Updating products for shop: {$shop->name} (ID: {$shopId})");

        try {
            $productUpdateService = new ProductUpdateService($shop);

            if ($sku) {
                // Update specific product by SKU
                $this->updateSpecificProduct($productUpdateService, $sku);
            } elseif ($categoryId) {
                // Update products by category
                $this->updateProductsByCategory($productUpdateService, $categoryId, $force);
            } else {
                // Update all products
                $this->updateAllProducts($productUpdateService, $force);
            }

            $this->info('Product update completed successfully!');
            return 0;

        } catch (Exception $e) {
            $this->error('Error updating products: ' . $e->getMessage());
            return 1;
        }
    }

    /**
     * Update a specific product by SKU
     */
    protected function updateSpecificProduct(ProductUpdateService $service, $sku)
    {
        $this->info("Updating product with SKU: {$sku}");
        
        try {
            $product = $service->updateProductBySku($sku);
            $this->info("Successfully updated product: {$product->name}");
        } catch (Exception $e) {
            $this->error("Failed to update product {$sku}: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Update products by category
     */
    protected function updateProductsByCategory(ProductUpdateService $service, $categoryId, $force)
    {
        $this->info("Updating products in category ID: {$categoryId}");
        
        if (!$force) {
            if (!$this->confirm('Are you sure you want to update all products in this category?')) {
                $this->info('Operation cancelled.');
                return;
            }
        }

        $result = $service->updateProductsByCategory($categoryId);
        
        $this->info("Category update completed:");
        $this->info("- Total products: {$result['total']}");
        $this->info("- Updated: {$result['updated']}");
        $this->info("- Errors: {$result['errors']}");
    }

    /**
     * Update all products for the shop
     */
    protected function updateAllProducts(ProductUpdateService $service, $force)
    {
        $this->info("Updating all products for the shop...");
        
        if (!$force) {
            if (!$this->confirm('Are you sure you want to update ALL products for this shop?')) {
                $this->info('Operation cancelled.');
                return;
            }
        }

        $result = $service->updateAllProducts();
        
        $this->info("All products update completed:");
        $this->info("- Total products: {$result['total']}");
        $this->info("- Updated: {$result['updated']}");
        $this->info("- Errors: {$result['errors']}");
    }
}
