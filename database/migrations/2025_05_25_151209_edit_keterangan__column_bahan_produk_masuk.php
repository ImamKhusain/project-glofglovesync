<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bahan_produk_masuks', function (Blueprint $table) {
            $table->boolean('keterangan')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bahan_produk_masuks', function (Blueprint $table) {
            // Jika ingin mengembalikan kolom ke tipe string lagi
            $table->string('keterangan')->change();
        });
    }
};
