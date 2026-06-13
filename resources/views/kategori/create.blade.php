@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('page_title', 'Buat Kategori Baru')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Kategori</h1>
        <p class="text-gray-500">Buat kategori baru untuk mengelompokkan artikelmu.</p>
    </div>

    <div class="glass rounded-3xl p-8 shadow-xl bg-white/50 backdrop-blur-lg">
        <form action="{{ route('kategori.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kategori</label>
                <input type="text" name="nama_kategori" 
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" 
                       placeholder="Contoh: Teknologi" value="{{ old('nama_kategori') }}" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                <textarea name="keterangan" rows="5" 
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" 
                          placeholder="Tulis penjelasan singkat mengenai kategori ini...">{{ old('keterangan') }}</textarea>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('kategori.index') }}" 
                   class="px-6 py-3 rounded-xl text-gray-600 font-semibold hover:bg-gray-100 transition-all">
                    Batal
                </a>
                <button type="submit" 
                        class="px-8 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 transition-all">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>
@endsection