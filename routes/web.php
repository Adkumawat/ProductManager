<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'categorys', 'as' => 'categorys.', 'controller' => CategoryController::class], function () {
    Route::get('/', 'index')->name('index');
});

Route::group(['prefix' => 'products', 'as' => 'products.', 'controller' => ProductController::class], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/destroy/{id}', 'destroy')->name('destroy');
});


