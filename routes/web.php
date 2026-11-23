
<?php

use App\Http\Controllers\CategoriController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductWebController;
use App\Http\Controllers\CategoryWebController;
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

// Route API kategori lama, tetap dipertahankan
Route::get('/categories', [CategoriController::class, 'categori']);

Route::get('/products/{id}', [ProductController::class, 'show']);

// Route Web Manajemen Produk
Route::get('/produk', [ProductWebController::class, 'index'])->name('produk.index');
Route::get('/produk/tambah', [ProductWebController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProductWebController::class, 'store'])->name('produk.store');
Route::get('/produk/{product}/edit', [ProductWebController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{product}', [ProductWebController::class, 'update'])->name('produk.update');
Route::delete('/produk/{product}', [ProductWebController::class, 'destroy'])->name('produk.destroy');

// Route Web Manajemen Kategori
Route::get('/kategori', [CategoryWebController::class, 'index'])->name('kategori.index');
Route::get('/kategori/tambah', [CategoryWebController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [CategoryWebController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{category}/edit', [CategoryWebController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{category}', [CategoryWebController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{category}', [CategoryWebController::class, 'destroy'])->name('kategori.destroy');
