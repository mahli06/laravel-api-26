<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriController extends Controller
{
    //
    public function categori()
    {
        return Response()->json([
            ['id' => 1, 'Kategori' => 'Makanan'],
            ['id' => 2, 'Kategori' => 'Pakaian'],
            ['id' => 3, 'Kategori' => 'Elektronik']
        ]);
    }
}
