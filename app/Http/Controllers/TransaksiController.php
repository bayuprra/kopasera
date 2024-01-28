<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Tempat;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => "Transaksi",
            'folder'    => "Home",
            'data'      => $this->Transaksi->getData(),
            // 'details'      => $this->Transaksi->getDetail(),
            'list'      => $this->Barang->get(),
            'list1'      => $this->Tempat->get(),

        ];
        // dump($data['data']);
        return view('layout/admin_layout/transaksi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $id = $request['id'];
        $data = [
            'title'     => "Transaksi",
            'folder'    => "Home",
            'data'      => $this->Transaksi->getDetail($id),
        ];
        return view('layout/admin_layout/detail_transaksi', $data);
    }

    public function addTransaksi()
    {

        $data = [
            'title'     => "Transaksi",
            'folder'    => "Home",
            'data'      => "",
            'barang'    => $this->Barang->getData(),
        ];
        return view('layout/admin_layout/tambah_transaksi', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
