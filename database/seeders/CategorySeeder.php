<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nama' => 'Makanan'],
            ['nama' => 'Minuman'],
            ['nama' => 'Cemilan'],
            ['nama' => 'Pakaian'],
            ['nama' => 'Elektronik'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}
