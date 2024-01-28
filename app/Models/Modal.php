<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    use HasFactory;
    protected $table = "modal";
    protected $fillable = [
        'id',
        'uang_keluar',
        'uang_masuk',
        'status',
        'created_at',
        'updated_at',
    ];
}
