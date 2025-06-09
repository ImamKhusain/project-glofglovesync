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
        Schema::create('konfirmasi_pengirimen', function (Blueprint $table) {
            $table->id();
            $table->string('id_pengiriman');
            $table->timestamp('tanggal_pengiriman');
            $table->integer('jumlah_pengiriman');
            $table->string('status_pengiriman');
            $table->string('review_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfirmasi_pengirimen');
    }
};
