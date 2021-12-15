<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'midtrans'], function () {

    Route::get('snap', [
        'uses' => 'MidtransController@snap',
        'as' => 'get.midtrans.snap'
    ]);

    Route::group(['prefix' => 'callback'], function () {

        Route::post('payment', [
            'uses' => 'MidtransController@notificationCallback',
            'as' => 'post.midtrans-callback.notification'
        ]);

    });

});
