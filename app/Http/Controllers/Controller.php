<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Stok;
use App\Models\Barang;
use App\Models\Tempat;
use App\Models\Kategori;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $akunModel, $Kategori, $Barang, $Stok, $Tempat;

    public function __construct()
    {
        $this->akunModel = new Akun();
        $this->Kategori = new Kategori();
        $this->Barang = new Barang();
        $this->Stok = new Stok();
        $this->Tempat = new Tempat();
    }
}
