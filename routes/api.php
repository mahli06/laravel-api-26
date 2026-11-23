<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/about', [AboutController::class, 'about']);

Route::get('/hello', function () {
    return 'halo, laravel';
});

// ROUTE PRODUK
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/trashed', [ProductController::class, 'trashed']);
Route::post('/products/{id}/restore', [ProductController::class, 'restore']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// ROUTE KATEGORI
Route::resource('categories', CategoryController::class);
