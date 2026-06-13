<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Penulis extends Authenticatable
{
    protected $table = 'penulis';

    // 👇 TAMBAHKAN BARIS INI 👇
    public $timestamps = false; 

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'user_name',
        'password',
        'foto'
    ];

    protected $hidden = [
        'password'
    ];
}