@extends('layouts.app')

@section('title', 'Tambah Artikel')
@section('page_title', 'Buat Artikel Baru')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Artikel</h1>
        <p class="text-gray-500">Buat artikel baru untuk BlogApp kamu.</p>
    </div>

    <div class="glass rounded-3xl p-8 shadow-xl bg-white/50 backdrop-blur-lg">
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Artikel</label>
                <input type="text" name="judul" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" placeholder="Masukkan judul artikel..." required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Penulis</label>
                    <select name="penulis_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                        <option value="">-- Pilih Penulis --</option>
                        @foreach($penulis as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_depan }} {{ $p->nama_belakang }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select name="kategori_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Unggah Gambar</label>
                <input type="file" name="gambar" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Artikel</label>
                <textarea name="isi" rows="8" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" placeholder="Tulis kontenmu di sini..." required></textarea>
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-gray-100">
                <a href="{{ route('artikel.index') }}" class="px-6 py-3 rounded-xl text-gray-600 font-semibold hover:bg-gray-100 transition-all">Batal</a>
                <button type="submit" class="px-8 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 transition-all">
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection