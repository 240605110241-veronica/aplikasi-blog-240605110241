<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Penulis;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $artikel = Artikel::with(['penulis','kategori'])
            ->when($keyword, function ($q) use ($keyword) {
                $q->where('judul', 'like', "%$keyword%");
            })
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('artikel.index', compact('artikel','keyword'));
    }

    public function create()
    {
        return view('artikel.create', [
            'penulis' => Penulis::all(),
            'kategori' => KategoriArtikel::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis_id' => 'required',
            'kategori_id' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image'
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar', 'public');
        }

        Artikel::create([
            'judul' => $request->judul,
            'penulis_id' => $request->penulis_id,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'gambar' => $gambar,
            'hari_tanggal' => now()
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', [
            'artikel' => $artikel,
            'penulis' => Penulis::all(),
            'kategori' => KategoriArtikel::all()
        ]);
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required',
            'penulis_id' => 'required',
            'kategori_id' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image'
        ]);

        $gambar = $artikel->gambar;

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $gambar = $request->file('gambar')->store('gambar', 'public');
        }

        $artikel->update([
            'judul' => $request->judul,
            'penulis_id' => $request->penulis_id,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'gambar' => $gambar
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diupdate');
    }

    public function destroy(Artikel $artikel)
    {
        try {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            $artikel->delete();

            return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->route('artikel.index')->with('error', 'Gagal menghapus artikel');
        }
    }
}