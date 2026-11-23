<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Menampilkan semua produk dan pencarian
    public function index(Request $request)
    {
        $query = Product::query();

        $search = $request->query('search');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('nama', 'like', '%' . $search . '%');
            });
        }

        return response()->json($query->latest()->get());
    }

    // Menampilkan detail produk
    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    // Menambahkan produk
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    // Mengubah produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return response()->json($product);
    }

    // Menghapus produk dengan Soft Delete
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus sementara'
        ]);
    }

    // Menampilkan produk yang sudah dihapus
    public function trashed()
    {
        return response()->json(Product::onlyTrashed()->get());
    }

    // Mengembalikan produk yang sudah dihapus
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        $product->restore();

        return response()->json([
            'message' => 'Produk berhasil dikembalikan',
            'data' => $product
        ]);
    }
}
