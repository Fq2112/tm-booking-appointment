<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\MainController;
use App\Http\Controllers\Pages\UserController;

Route::group(['prefix' => '/', 'namespace' => 'Pages'], function () {

    Route::get('/', [MainController::class, 'home'])->name('home');

    Route::group(['prefix' => 'booking'], function () {
        Route::get('{q?}', [MainController::class, 'bookingForm'])->name('booking-form');
    });

    Route::get('booking-list', [UserController::class, 'bookingList'])
        ->name('booking-list')
        ->middleware('auth');
});
