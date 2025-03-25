<?php

namespace App\Listeners;

use App\Events\RetailerCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RetailerDefultEarning
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RetailerCreate  $event
     * @return void
     */
    public function handle(RetailerCreate $event)
    {
   
        $retailer=$event->retailer;
        $retailer->bonuses()->create([
            'ammount'=>setting('site.retailer_create_share'),
            'description'=>'Retailer Creation defualt bonus',
            'retailer_id'=>$retailer->id
        ]);
        dd($retailer->bonuses);
       
    }
}
