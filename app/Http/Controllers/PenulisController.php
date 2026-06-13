<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::all();
        return view('penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_depan'    => 'required|max:100',
            'nama_belakang' => 'required|max:100',
            'user_name'     => 'required|max:100|unique:penulis,user_name',
            'password'      => 'required|min:6',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto', 'public');
        }

        Penulis::create([
            'nama_depan'    => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'user_name'     => $request->user_name,
            'password'      => Hash::make($request->password),
            'foto'          => $foto
        ]);

        return redirect()->route('penulis.index')->with('success', 'Data penulis berhasil ditambahkan');
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);

        $request->validate([
            'nama_depan'    => 'required|max:100',
            'nama_belakang' => 'required|max:100',
            'user_name'     => 'required|max:100|unique:penulis,user_name,' . $id,
            'password'      => 'nullable|min:6',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = $penulis->foto;

        if ($request->hasFile('foto')) {
            if ($penulis->foto) {
                Storage::disk('public')->delete($penulis->foto);
            }
            $foto = $request->file('foto')->store('foto', 'public');
        }

        $data = [
            'nama_depan'    => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'user_name'     => $request->user_name,
            'foto'          => $foto
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $penulis->update($data);

        return redirect()->route('penulis.index')->with('success', 'Data penulis berhasil diupdate');
    }

    public function destroy($id)
    {
        try {
            $penulis = Penulis::findOrFail($id);

            if ($penulis->foto) {
                Storage::disk('public')->delete($penulis->foto);
            }

            $penulis->delete();

            return redirect()->route('penulis.index')->with('success', 'Data penulis berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('penulis.index')->with('error', 'Data penulis tidak dapat dihapus karena masih digunakan oleh artikel');
        }
    }
}