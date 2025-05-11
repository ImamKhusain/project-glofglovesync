<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanDashboard extends Model
{
    use HasFactory;

    protected $fillable = [
        "progress",
        "target_produksi",
        "diproduksi",
    ];

    public function laporanProduksi()
    {
        return $this->hasMany(LaporanProduksi::class);
    }

    public function updateProduksiTotals()
    {
        $totalTarget = $this->laporanProduksi()->sum('target_produksi');
        $totalDiproduksi = $this->laporanProduksi()->sum('produksi_berhasil');
        // $totalTarget = $this->laporanProduksi()->where('is_published', true)->sum('target_produksi');
        // $totalDiproduksi = $this->laporanProduksi()->where('is_published', true)->sum('produksi_berhasil');

        $this->update([
            'target_produksi' => $totalTarget,
            'diproduksi' => $totalDiproduksi,
        ]);
    }
}
