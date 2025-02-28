<?php

namespace App\Listeners;

use App\Events\ShopCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ShopCreationRetailerDefultEarning
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
     * @param  \App\Events\ShopCreate  $event
     * @return void
     */
    public function handle(ShopCreate $event)
    {
        // dd($event);

        $shop=$event->shop;
        $shop->bonuses()->create([
        'ammount'=>setting('site.shop_create_share'),
        'description'=>'Shop Creation bonus',
        'retailer_id'=>$shop->retailer->id,
        ]);
    }
}
