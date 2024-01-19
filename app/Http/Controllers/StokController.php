<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Barang;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => "Stok",
            'folder'    => "Home",
            'data'      => $this->Stok->getData(),
            'list'      => $this->Barang->get(),
        ];
        return view('layout/admin_layout/stok', $data);
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
            'barang_id' => $data['barang_id'],
            'status' => $data['status'],
            'jumlah' => $data['jumlah'],
            'total'=> $data['total'],
        );
        // dd($dataToInserted);
        $inserted = $this->Stok::create($dataToInserted);
        if ($inserted) {

            return redirect()->back()->with('success', 'Stok Berhasil Ditambahkan');
        }
        return redirect()->back()->with('error', 'Stok Gagal Ditambahkan');
    }

   
    public function update(Request $request, Stok $stok)
    {
        $data = $request->all();
        $id = $data['id'];
        $dataSpec = $this->Stok->find($id);

        $dataToUpdate = [
            'barang_id' => $data['barang_id'],
            'status' => $data['status'],
            'jumlah' => $data['jumlah'],
            'total'=> $data['total'],
        ];

        $updateData = $dataSpec->update($dataToUpdate);
        if ($updateData) {
            return redirect()->back()->with('success', 'Stok Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Stok Gagal Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = intval($request['id']);
        $data = $this->Stok->find($id);
        $deleteData = $data->delete();
        if ($deleteData) {
            return redirect()->back()->with('success', 'Stok Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Stok Gagal Dihapus');
    }
}
