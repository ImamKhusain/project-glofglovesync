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
        Schema::create('update_stock_bahan_bakus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan');
            $table->integer('stok_lama');
            $table->integer('stok_terbaru');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_stock_bahan_bakus');
    }
};
