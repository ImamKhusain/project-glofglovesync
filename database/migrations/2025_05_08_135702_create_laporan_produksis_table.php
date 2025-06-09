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
        Schema::create('laporan_produksis', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal_produksi');
            $table->integer('target_produksi');
            $table->integer('produksi_berhasil');
            $table->integer('produksi_gagal');
            $table->integer('jumlah_produksi');
            $table->boolean('is_published')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_produksis');
    }
};
