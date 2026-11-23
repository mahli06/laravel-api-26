<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryWebController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('kategori.index', compact('categories'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Category::create($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form edit kategori
    public function edit(Category $category)
    {
        return view('kategori.edit', compact('category'));
    }

    // Memperbarui kategori
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $category->update($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}