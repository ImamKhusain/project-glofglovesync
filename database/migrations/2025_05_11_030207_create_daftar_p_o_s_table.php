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
        Schema::create('daftar_p_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('id_po');
            $table->timestamp('tanggal_permintaan');
            $table->integer('jumlah_dikirim');
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
        Schema::dropIfExists('daftar_p_o_s');
    }
};
