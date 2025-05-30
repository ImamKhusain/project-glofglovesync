<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanProdukMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        "tanggal",
        "nama_bahan",
        "jumlah",
        "supplier",
        "keterangan",
    ];
}
