<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $makanan = Category::where('nama', 'Makanan')->firstOrFail()->id;
        $minuman = Category::where('nama', 'Minuman')->firstOrFail()->id;
        $cemilan = Category::where('nama', 'Cemilan')->firstOrFail()->id;
        $pakaian = Category::where('nama', 'Pakaian')->firstOrFail()->id;
        $elektronik = Category::where('nama', 'Elektronik')->firstOrFail()->id;

        $products = [
            [
                'name' => 'Beras Premium 5 Kg',
                'nama' => 'Beras Premium 5 Kg',
                'sku' => 'BRG-001',
                'price' => 75000,
                'harga' => 75000,
                'deskripsi' => 'Beras premium berkualitas tinggi dengan tekstur pulen.',
                'stok' => 39,
                'category_id' => $makanan,
            ],
            [
                'name' => 'Mie Goreng 1 dus',
                'nama' => 'Mie Goreng 1 dus',
                'sku' => 'BRG-002',
                'price' => 80000,
                'harga' => 80000,
                'deskripsi' => 'Mie Goreng Dengan Rasa yang enak.',
                'stok' => 20,
                'category_id' => $makanan,
            ],
            [
                'name' => 'Marimas',
                'nama' => 'Marimas',
                'sku' => 'BRG-003',
                'price' => 5000,
                'harga' => 5000,
                'deskripsi' => 'Berbagai rasa marimas yang manis dan enak.',
                'stok' => 25,
                'category_id' => $minuman,
            ],
            [
                'name' => 'Roma Kelapa',
                'nama' => 'Roma Kelapa',
                'sku' => 'BRG-004',
                'price' => 10000,
                'harga' => 10000,
                'deskripsi' => 'Rasa Biskuit kelapa yang bikin nagih.',
                'stok' => 15,
                'category_id' => $cemilan,
            ],
            [
                'name' => 'Jacket',
                'nama' => 'Jacket',
                'sku' => 'BRG-005',
                'price' => 200000,
                'harga' => 200000,
                'deskripsi' => 'Jacket dengan kain tebal tapi nyaman.',
                'stok' => 30,
                'category_id' => $pakaian,
            ],
            [
                'name' => 'Musik Box',
                'nama' => 'Musik Box',
                'sku' => 'BRG-006',
                'price' => 80000,
                'harga' => 80000,
                'deskripsi' => 'Speaker dengan suara bass yang keras.',
                'stok' => 19,
                'category_id' => $elektronik,
            ],
        ];

        Product::insert($products);
    }
}
