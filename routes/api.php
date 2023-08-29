<?php

use Illuminate\Support\Facades\Route;

Route::group(['name' => 'api'], function () {
Route::get('/manufacturer/{id}',[App\Http\Controllers\Api\ManufacturerController::class,'show']);

Route::get('/manufacturer',[App\Http\Controllers\Api\ManufacturerController::class,'index']);


    Route::get('/category/{id}', [App\Http\Controllers\Api\CategoryController::class, 'show']);
    Route::get('/category', [App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::get('/product/{id}', [App\Http\Controllers\Api\ProductController::class, 'show']);
    Route::get('/products', [App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::get('/about/{id}', [App\Http\Controllers\Api\AboutController::class, 'show']);
    Route::get('/about', [App\Http\Controllers\Api\AboutController::class, 'index']);
    Route::get('/slider', [App\Http\Controllers\Api\SliderController::class, 'index']);
    Route::get('/slider/{id}', [App\Http\Controllers\Api\SliderController::class, 'show']);
    Route::get('/gallery', [App\Http\Controllers\Api\GalleryController::class, 'index']);
    Route::get('/gallery/{id}', [App\Http\Controllers\Api\GalleryController::class, 'show']);
});
