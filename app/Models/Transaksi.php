<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $fillable = [
        'total_belanja',
        'pembayaran',
        'tempat_id'
    ];

    function getData()
    {
        return DB::table('transaksi')
        ->join('tempat', 'tempat.id', '=', 'transaksi.tempat_id')
        ->join('detail_transaksi', 'detail_transaksi.id', '=', 'detail_transaksi.transaksi_id')
        ->join('barang', 'barang.id', '=', 'detail_transaksi.barang_id')
        ->select (
            'transaksi.*',
            'detail_transaksi.id as detai_id',
            'detail_transaksi.jumlah as jumlah',
            'barang.id as barang_id',
            'barang.nama as nama_barang',
            'barang.harga_jual as harga_barang',
            'tempat.id as tempat_id',
            'tempat.tempat as tempat',
        )
        ->get();

    }
    function getDetail($id)
    {
        return DB::table('detail_transaksi')
        ->join('transaksi', 'transaksi.id', '=', 'detail_transaksi.transaksi_id')
        ->join('barang', 'barang.id', '=', 'detail_transaksi.barang_id')
        ->select (
            'transaksi.id as id',
            'detail_transaksi.id as detai_id',
            'detail_transaksi.jumlah as jumlah',
            'barang.id as barang_id',
            'barang.nama as nama_barang',
            'barang.harga_jual as harga_barang',
        )
        ->where('transaksi.id', $id)
        ->get();

    }
}
