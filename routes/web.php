<?php

use App\Http\Controllers\CategoriController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Halo, Laravel';
});

Route::get('/products/{id}/edit', function ($id) {
    return 'From edit produk = ' . $id;
})->name('products.edit');

Route::get('/products', [ProductController::class, 'dataProductView']);

Route::get('/about', [AboutController::class, 'about']);
Route::get('/categories', [CategoriController::class, 'categori']);
Route::get('/products/{id}', [ProductController::class, 'show']);