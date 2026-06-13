<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
// Ubah bagian ini sesuai nama modelmu yang sebenarnya
use App\Models\KategoriArtikel; 
use Illuminate\Http\Request;

class FrontController extends Controller
{
    // Halaman Utama: Menampilkan 5 artikel terbaru & widget kategori
    public function index(Request $request)
    {
        // Mengubah Kategori::all() menjadi KategoriArtikel::all()
        $kategoriList = KategoriArtikel::all();

        // Query artikel dasar
        $query = Artikel::with(['penulis', 'kategori'])->latest();

        // Fitur menyaring artikel berdasarkan kategori (jika ada parameter ?kategori=id)
        if ($request->has('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        // Mengambil 5 artikel terbaru
        $artikel = $query->take(5)->get();

        return view('front.index', compact('artikel', 'kategoriList'));
    }

    // Halaman Detail: Menampilkan isi artikel & 5 artikel terkait
    public function show($id)
    {
        $artikel = Artikel::with(['penulis', 'kategori'])->findOrFail($id);
        
        // Mengambil 5 artikel terkait dari kategori yang sama (kecuali artikel yang sedang dibuka)
        $artikelTerkait = Artikel::where('kategori_id', $artikel->kategori_id)
                                ->where('id', '!=', $id)
                                ->latest()
                                ->take(5)
                                ->get();

        return view('front.show', compact('artikel', 'artikelTerkait'));
    }
}