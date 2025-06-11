<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::resource('/brand', BrandsController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/product', ProductsController::class);