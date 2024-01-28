<?php

namespace App\Http\Controllers;

use App\Models\Modal;
use App\Models\Model;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => "Data Modal",
            'folder'    => "Home",
            'data'      => $this->Modal->get()
        ];
        return view('layout/admin_layout/modal', $data);
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
            'uang_keluar'     => $data['uang_keluar'],
        );
        $inserted = $this->Modal::create($dataToInserted);
        if ($inserted) {

            return redirect()->back()->with('success', 'Modal Berhasil Ditambahkan');
        }
        return redirect()->back()->with('error', 'Modal Gagal Ditambahkan');
    }

    public function update(Request $request, Modal $model)
    {
        $data = $request->all();
        $id = $data['id'];
        $dataSpec = $this->Modal->find($id);

        $dataToUpdate = [
            'uang_keluar'     => $data['uang_keluar'],
            'uang_masuk'     => $data['uang_masuk'],
            'updated_at'     => now(),
        ];

        $updateData = $dataSpec->update($dataToUpdate);
        if ($updateData) {
            return redirect()->back()->with('success', 'Modal Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Modal Gagal Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = intval($request['id']);
        $data = $this->Modal->find($id);
        $deleteData = $data->delete();
        if ($deleteData) {
            return redirect()->back()->with('success', 'Modal Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Modal Gagal Dihapus');
    }
}
