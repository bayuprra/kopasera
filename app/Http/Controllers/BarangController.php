<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => "Barang",
            'folder'    => "Home",
            'data'      => $this->Barang->getData(),
            'list'      => $this->Kategori->get(),

        ];
        // dump($data['data']);
        return view('layout/admin_layout/barang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->all();
        $dataToInserted = array(
            'nama' => $data['nama'],
            'harga_jual' => $data['harga_jual'],
            'harga_modal' => $data['harga_modal'],
            'kategori_id'=> $data['kategori'],
        );
        // dd($dataToInserted);
        $inserted = $this->Barang::create($dataToInserted);
        if ($inserted) { 
            $StokToInserted = array(
                'barang_id'     => $inserted->id,
                'status'    => "masuk",
                'jumlah'    => $data['jumlah'],
                'total'      => $data['jumlah']
            );
            $insertedStok = $this->Stok::create($StokToInserted);
            return redirect()->back()->with('success', 'Barang Berhasil Ditambahkan');
        }
        return redirect()->back()->with('error', 'Barang Gagal Ditambahkan');
    }



    public function addStok(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $stok_id = $data['stok_id'];
        $dataSpec = $this->Stok->find($stok_id);
        $dataToInserted = array(
            'barang_id'     =>$data['id'],
                'status'    => "masuk",
                'jumlah'    => $data['jumlah'],
                'total'      => $dataSpec['total'] + $data['jumlah']
        );
        $inserted = $this->Stok::create($dataToInserted);
        if ($inserted) {

            return redirect()->back()->with('success', 'Stok Berhasil Ditambahkan');
        }
        return redirect()->back()->with('error', 'Stok Gagal Ditambahkan');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $data = $request->all();
        $id = $data['id'];
        $dataSpec = $this->Barang->find($id);

        $dataToUpdate = [
            'nama' => $data['nama'],
            'harga_jual' => $data['harga_jual'],
            'harga_modal' => $data['harga_modal'],
            'kategori_id'=> $data['kategori'],
        ];

        $updateData = $dataSpec->update($dataToUpdate);
        if ($updateData) {
            return redirect()->back()->with('success', 'Barang Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Barang Gagal Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = intval($request['id']);
        $data = $this->Barang->find($id);
        $deleteData = $data->delete();
        if ($deleteData) {
            return redirect()->back()->with('success', 'Barang Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Barang Gagal Dihapus');
    }
}
