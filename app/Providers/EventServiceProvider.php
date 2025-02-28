<?php

namespace App\Providers;

use App\Events\ChargeStatusHasBeenUpdated;
use App\Events\ProductCreate;
use App\Events\RetailerCreate;
use App\Events\ShopCreate;
use App\Listeners\ProductCreationRetailerDefultEarning;
use App\Listeners\RetailerDefultEarning;
use App\Listeners\ShopCreationRetailerDefultEarning;
use App\Listeners\UpdateChargeable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ChargeStatusHasBeenUpdated::class => [
            UpdateChargeable::class
        ],
        RetailerCreate::class => [
            RetailerDefultEarning::class,
        ],
        ShopCreate::class => [
            ShopCreationRetailerDefultEarning::class,
        ],
        ProductCreate::class => [
            ProductCreationRetailerDefultEarning::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
