<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanProduk extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_pengiriman",
        "tanggal_pengiriman",
        "jumlah_pengiriman",
        "status_pengiriman",
        "review",
    ];
}
