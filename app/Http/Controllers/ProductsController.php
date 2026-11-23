<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         return response()->json([
            ['id' => 1, 'name' => '76 Royal Apel', 'harga' => 17000, 'stok' => 10],
            ['id' => 2, 'name' => 'Black Matcha', 'harga' => 17000, 'stok' => 20],
            ['id' => 3, 'name' => 'Raptor', 'harga' => 18000, 'stok' => 15],
            ['id' => 4, 'name' => 'Chief', 'harga' => 19000, 'stok' => 30],
            ['id' => 5, 'name' => 'Fajar Berlian 82', 'harga' => 12000, 'stok' => 50],
            ['id' => 6, 'name' => 'Marlboro', 'harga' => 13000, 'stok' => 40],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
        ]);

        return response()->json([
            'message' => 'Produk berhasil diterima',
            'data' => $data
        ], 201);
    }

     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $products = [
            1 => ['id' => 1, 'name' => '76 Royal Apel', 'harga' => 17000, 'stok' => 10],
            2 => ['id' => 2, 'name' => 'Black Matcha', 'harga' => 17000, 'stok' => 20],
            3 => ['id' => 3, 'name' => 'Raptor', 'harga' => 18000, 'stok' => 15],
            4 => ['id' => 4, 'name' => 'Chief', 'harga' => 19000, 'stok' => 30],
            5 => ['id' => 5, 'name' => 'Fajar Berlian 82', 'harga' => 12000, 'stok' => 50],
            6 => ['id' => 6, 'name' => 'Marlboro', 'harga' => 13000, 'stok' => 40],
        ];

        if (!isset($products[$id])) {
            return response()->json([
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => $products[$id]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destory(string $id)
    {
        //
    }

}