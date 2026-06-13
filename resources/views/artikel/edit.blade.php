@extends('layouts.app')

@section('title', 'Edit Artikel')
@section('page_title', 'Edit Data Artikel')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Edit Artikel</h1>
        <p class="text-gray-500">Perbarui konten dan informasi artikelmu di sini.</p>
    </div>

    <div class="glass rounded-3xl p-8 shadow-xl bg-white/50 backdrop-blur-lg">
        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Artikel</label>
                <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}" 
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Penulis</label>
                    <select name="penulis_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                        @foreach($penulis as $p)
                            <option value="{{ $p->id }}" {{ $artikel->penulis_id == $p->id ? 'selected' : '' }}>
                                {{ $p->nama_depan }} {{ $p->nama_belakang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select name="kategori_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                        @foreach($kategori as $k)
                            <option value="{{ $k->id }}" {{ $artikel->kategori_id == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Artikel</label>
                <textarea name="isi" rows="8" 
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" required>{{ old('isi', $artikel->isi) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Gambar (Opsional)</label>
                @if($artikel->gambar)
                    <div class="mb-4">
                        <p class="text-xs text-gray-400 mb-2">Gambar saat ini:</p>
                        <img src="{{ asset('storage/'.$artikel->gambar) }}" class="w-32 h-32 rounded-xl object-cover shadow-sm">
                    </div>
                @endif
                <input type="file" name="gambar" 
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none">
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-gray-100">
                <a href="{{ route('artikel.index') }}" 
                   class="px-6 py-3 rounded-xl text-gray-600 font-semibold hover:bg-gray-100 transition-all">
                    Batal
                </a>
                <button type="submit" 
                        class="px-8 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 transition-all">
                    Update Artikel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection