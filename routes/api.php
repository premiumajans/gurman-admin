<?php

use Illuminate\Support\Facades\Route;

Route::group(['name' => 'api'], function () {
    Route::get('/about/{id}', [App\Http\Controllers\Api\AboutController::class, 'show']);
    Route::get('/about', [App\Http\Controllers\Api\AboutController::class, 'index']);
    Route::get('/slider', [App\Http\Controllers\Api\SliderController::class, 'index']);
    Route::get('/slider/{id}', [App\Http\Controllers\Api\SliderController::class, 'show']);

});
