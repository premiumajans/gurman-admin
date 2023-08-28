<?php

use Illuminate\Support\Facades\Route;

Route::group(['name' => 'api'], function () {
Route::get('/product/{id}',[App\Http\Controllers\Api\ProductController::class,'show']);

Route::get('/product',[App\Http\Controllers\Api\ProductController::class,'index']);

    Route::get('/about/{id}', [App\Http\Controllers\Api\AboutController::class, 'show']);
    Route::get('/about', [App\Http\Controllers\Api\AboutController::class, 'index']);
    Route::get('/slider', [App\Http\Controllers\Api\SliderController::class, 'index']);
    Route::get('/slider/{id}', [App\Http\Controllers\Api\SliderController::class, 'show']);
    Route::get('/gallery', [App\Http\Controllers\Api\GalleryController::class, 'index']);
    Route::get('/gallery/{id}', [App\Http\Controllers\Api\GalleryController::class, 'show']);
});
