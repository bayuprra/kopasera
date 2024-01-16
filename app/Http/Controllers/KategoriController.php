<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    function index(){
        $data = [
            'title'     => "Kategori",
            'folder'    => "Home",
            'data'      => $this->Kategori->get()
        ];
        return view('layout/admin_layout/kategori', $data);
    }
    public function store(Request $request){
        $data = $request->all();
        $dataToInserted = array(
            'nama'     => $data['nama'],
        );
        $inserted = $this->Kategori::create($dataToInserted);
        if ($inserted) {          
            return redirect()->back()->with('success', 'Kategori Berhasil Ditambahkan');
        }
    }
      
}
