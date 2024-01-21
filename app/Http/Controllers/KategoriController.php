<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => "Kategori",
            'folder'    => "Home",
            'data'      => $this->Kategori->get()
        ];
        return view('layout/admin_layout/kategori', $data);
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
            'kategori'     => $data['kategori'],
        );
        $inserted = $this->Kategori::create($dataToInserted);
        if ($inserted) {

            return redirect()->back()->with('success', 'Kategori Berhasil Ditambahkan');
        }
        return redirect()->back()->with('error', 'Kategori Gagal Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, Kategori $kategori)
    {
        $data = $request->all();
        $id = $data['id'];
        $dataSpec = $this->Kategori->find($id);

        $dataToUpdate = [
            'kategori'     => $data['kategori'],
        ];

        $updateData = $dataSpec->update($dataToUpdate);
        if ($updateData) {
            return redirect()->back()->with('success', 'Kategori Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Kategori Gagal Diubah');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = intval($request['id']);
        $data = $this->Kategori->find($id);
        $deleteData = $data->delete();
        if ($deleteData) {
            return redirect()->back()->with('success', 'Kategori Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Kategori Gagal Dihapus');
    }
}
