<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateStockBahanBaku extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama_bahan",
        "stok_lama",
        "stok_terbaru",
        "status",
    ];
}
