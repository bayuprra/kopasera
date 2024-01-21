<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    use HasFactory;
    protected $table = "stok";
    protected $fillable = [
        'barang_id',
        'status',
        'jumlah',
        'total',
    ];
    
    function getData()
    {
        return DB::table('stok')
        ->join('barang', 'barang.id', '=', 'stok.barang_id')
        ->select(
            'stok.*',
            'barang.nama as nama',
            )
        ->get();
    }
}
