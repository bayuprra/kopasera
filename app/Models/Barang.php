<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $fillable = [
        'nama',
        'harga_jual',
        'harga_modal',
        'kategori_id'
    ];

    function getData()
    {
        return DB::table('barang')
        ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
        ->join('stok', 'barang.id', '=', 'stok.barang_id')
        ->select (
            'barang.*',
            'kategori.kategori as kNama',
            'stok.total as total',
            'stok.id as stok_id'
        )
        ->groupBy('barang_id')
        ->get();

    }
}
