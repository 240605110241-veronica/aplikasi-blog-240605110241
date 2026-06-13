<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $kategori = KategoriArtikel::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100|unique:kategori_artikel,nama_kategori',
            'keterangan'    => 'nullable|max:255'
        ]);

        KategoriArtikel::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriArtikel::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|max:100|unique:kategori_artikel,nama_kategori,' . $id,
            'keterangan'    => 'nullable|max:255'
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        try {
            $kategori = KategoriArtikel::findOrFail($id);
            $kategori->delete();

            return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Data kategori tidak dapat dihapus karena masih digunakan oleh artikel');
        }
    }
}