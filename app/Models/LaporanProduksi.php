<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanProduksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_produksi',
        'target_produksi',
        'produksi_berhasil',
        'produksi_gagal',
        'jumlah_produksi',
        'is_published',
    ];

    public function karyawanDashboard()
    {
        return $this->belongsTo(KaryawanDashboard::class);
    }
}
