<?php

namespace App\Listeners;

use App\Events\ProductCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductCreationRetailerDefultEarning
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProductCreate  $event
     * @return void
     */

    public function handle(ProductCreate $event)
    {
        $product = $event->product;

        if($product && $product->shop->retailer_id){

            $product->bonuses()->create([
                'ammount' => setting('site.product_create_share'),
                'description' => 'Retailer Product Creation bonus',
                'retailer_id'=>$product->shop->retailer->id,
            ]);
        }
    }
}
