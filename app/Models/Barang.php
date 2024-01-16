<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "data_barang";
    protected $fillable = [
        'id',
        'nama_barang',
        'id_kategori',
        'harga_beli',
        'harga_jual'
    ];
}
