<?php

use App\Http\Controllers\Marchentiger\PageController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'as' => 'marchentiger.',
        'prefix' => 'marchentiger/dashboard',
    ],
    function () {
        // Route::get('/',function ()  {
        //     return 'hello';
        // });

        Route::get('/',[PageController::class,'dashboard'])->name('dashboard');
        Route::get('/settings',[PageController::class,'changePassword'])->name('password.change');
        Route::post('/update_password', [PageController::class, 'update_password'])->name('update_password');

        Route::post('/create-or-update',[PageController::class,'createOrUpdate'])->name('create_or_update');
    },
);
