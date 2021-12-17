<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\MainController;

Route::group(['prefix' => '/', 'namespace' => 'Pages'], function () {

    Route::get('/', [MainController::class, 'home'])->name('home');

    Route::group(['prefix' => 'find-doctor'], function () {
        Route::get('{permalink?}', [MainController::class, 'findDoctor'])->name('find-doctor');
        Route::get('{permalink}/{id}/booking', [MainController::class, 'bookingDoctor'])->name('booking-doctor');
    });

});
