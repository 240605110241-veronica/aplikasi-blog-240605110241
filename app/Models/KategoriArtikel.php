<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $table = 'kategori_artikel';

    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
        'keterangan'
    ];

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'kategori_id');
    }
}