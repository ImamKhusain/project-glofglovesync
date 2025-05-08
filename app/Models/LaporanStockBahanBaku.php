<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanStockBahanBaku extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_bahan_baku",
        "nama_bahan_baku",
        "stok_awal",
        "stok_terpakai",
        "stok_sisa",
    ];
}
