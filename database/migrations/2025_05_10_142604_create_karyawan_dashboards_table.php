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
        Schema::create('karyawan_dashboards', function (Blueprint $table) {
            $table->id();
            $table->integer('progress')->default(0);
            $table->integer('target_produksi')->default(0);
            $table->integer('diproduksi')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('karyawan_dashboard_id')->nullable();
            $table->foreign('karyawan_dashboard_id')->references('id')->on('karyawan_dashboards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_produksi', function (Blueprint $table) {
            $table->dropForeign(['karyawan_dashboard_id']);
            $table->dropColumn('karyawan_dashboard_id');
        });
    }
};
