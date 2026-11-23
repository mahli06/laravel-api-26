<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        return response()->json(Category::all());
    }

    // Menambahkan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $category = Category::create($request->only('nama'));

        return response()->json([
            'message' => 'Kategori berhasil ditambahkan',
            'data' => $category
        ], 201);
    }

    // Menampilkan detail kategori
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return response()->json($category);
    }

    // Mengubah kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);

        $category->update($request->only('nama'));

        return response()->json([
            'message' => 'Kategori berhasil diubah',
            'data' => $category
        ]);
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json([
            'message' => 'Kategori berhasil dihapus'
        ]);
    }
}
