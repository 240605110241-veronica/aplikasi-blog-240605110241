<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use App\Models\KategoriArtikel; // Ubah import-nya jadi ini
use App\Models\Penulis;        // Pastikan Penulis juga di-import

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalArtikel' => Artikel::count(),
            'totalPenulis' => Penulis::count(), // Gunakan model Penulis
            'totalKategori' => KategoriArtikel::count(), // Gunakan model KategoriArtikel
            'artikelTerbaru' => Artikel::latest()->take(5)->get()
        ];

        return view('dashboard.index', $data);
    }
}