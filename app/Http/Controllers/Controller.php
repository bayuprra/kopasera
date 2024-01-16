<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Kategori;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $akunModel;

    public function __construct()
    {
        $this->akunModel = new Akun();
        $this->Kategori = new Kategori();
    }
}
