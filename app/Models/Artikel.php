<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $fillable = [
        'penulis_id',
        'kategori_id',
        'judul',
        'isi',
        'gambar',
        'hari_tanggal'
    ];

    // 👇 UBAH BAGIAN INI MENJADI FALSE 👇
    public $timestamps = true;

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'kategori_id');
    }
}