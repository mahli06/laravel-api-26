<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductWebController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('produk.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $categories = Category::all();

        return view('produk.create', compact('categories'));
    }

    // Menyimpan produk baru
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan form edit produk
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('produk.edit', compact('product', 'categories'));
    }

    // Memperbarui produk
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}