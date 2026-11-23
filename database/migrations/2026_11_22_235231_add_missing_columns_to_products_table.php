
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            if (!Schema::hasColumn('products', 'nama')) {
                $table->string('nama')->nullable();
            }

            if (!Schema::hasColumn('products', 'deskripsi')) {
                $table->text('deskripsi')->nullable();
            }

            if (!Schema::hasColumn('products', 'harga')) {
                $table->integer('harga')->nullable();
            }

            if (!Schema::hasColumn('products', 'stok')) {
                $table->integer('stok')->default(0);
            }
        });
    }

    public function down(): void
    {
        // Tidak menghapus kolom agar data yang sudah ada tetap aman.
    }
};
