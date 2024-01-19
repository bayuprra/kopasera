<?php

namespace App\Http\Controllers;

use App\Models\Tempat;
use Illuminate\Http\Request;

class TempatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'     => "Tempat",
            'folder'    => "Home",
            'data'      => $this->Tempat->get(),
        ];
        return view('layout/admin_layout/tempat', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $dataToInserted = array(
            'tempat'     => $data['tempat'],
        );
        $inserted = $this->Tempat::create($dataToInserted);
        if ($inserted) {

            return redirect()->back()->with('success', 'Tempat Berhasil Ditambahkan');
        }
        return redirect()->back()->with('error', 'Tempat Gagal Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function show(Tempat $tempat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function edit(Tempat $tempat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tempat $tempat)
    {
        $data = $request->all();
        $id = $data['id'];
        $dataSpec = $this->Tempat->find($id);

        $dataToUpdate = [
            'tempat'     => $data['tempat'],
        ];

        $updateData = $dataSpec->update($dataToUpdate);
        if ($updateData) {
            return redirect()->back()->with('success', 'Tempat Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Tempat Gagal Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = intval($request['id']);
        $data = $this->Tempat->find($id);
        $deleteData = $data->delete();
        if ($deleteData) {
            return redirect()->back()->with('success', 'Tempat Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Tempat Gagal Dihapus');
    }
}
