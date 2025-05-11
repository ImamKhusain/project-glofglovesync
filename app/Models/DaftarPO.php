<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPO extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_po",
        "tanggal_permintaan",
        "jumlah_dikirim",
        "status_pengiriman",
        "review_barang",
    ];
}
