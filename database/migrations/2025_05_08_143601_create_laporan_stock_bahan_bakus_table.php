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
        Schema::create('laporan_stock_bahan_bakus', function (Blueprint $table) {
            $table->id();
            $table->string('id_bahan_baku');
            $table->string('nama_bahan_baku');
            $table->integer('stok_awal');
            $table->integer('stok_terpakai');
            $table->integer('stok_sisa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_stock_bahan_bakus');
    }
};
