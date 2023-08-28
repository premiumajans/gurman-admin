<?php

use App\Http\Controllers\Backend\LanguageController as LChangeLan;
use App\Http\Controllers\Frontend\HomeController as FHome;
use App\Http\Controllers\Frontend\AboutController as FAbout;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'as' => 'frontend.', 'middleware' => 'frontLanguage'], function () {
    Route::get('/contact-us', function () {
        return view('frontend.contact-us.index');
    })->name('contact-us-page');
    Route::get('/categories/{slug}', [App\Http\Controllers\Frontend\CategoryController::class, 'show'])->name('selectedCategory');
    Route::post('/search', [\App\Http\Controllers\Frontend\HomeController::class, 'search'])->name('search');
    Route::get('c/{contentSlug}', [App\Http\Controllers\Frontend\ContentController::class, 'show'])->name('selectedContent');
    Route::get('/change-language/{dil}', [LChangeLan::class, 'frontLanguage'])->name('frontLanguage');
    Route::get('create-order', [FHome::class, 'createOrder'])->name('createOrder');
    Route::post('/contact-us/send-message', [FHome::class, 'sendMessage'])->name('sendMessage');
    Route::post('/order/new', [FHome::class, 'newOrder'])->name('newOrder');
    Route::get('/', [FHome::class, 'index'])->name('index');
    Route::get('/about', [FAbout::class, 'index'])->name('about');
    Route::get('/blogs', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blogs');
    Route::get('/blog/{slug}', [\App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog');
    Route::post('/search', [FHome::class, 'search'])->name('search');
    Route::post('general/search', [FHome::class, 'searchByKeyword'])->name('searchByKeyword');
    Route::post('/newsletter-add-new', [FHome::class, 'newsletter'])->name('newsletter');
    Route::get('/newsletter/{id}/{token}', [FHome::class, 'verifyMail'])->name('verifyMail');
    Route::get('18', [FHome::class, 'agreeTerm'])->name('18');
    Route::get('mail/test', function () {
        return view('backend.mail.send');
    });
});
