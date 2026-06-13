@extends('layouts.app')

@section('title', 'Edit Penulis')
@section('page_title', 'Edit Data Penulis')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Edit Penulis</h1>
        <p class="text-gray-500">Ubah profil penulis sesuai kebutuhan.</p>
    </div>

    <div class="glass rounded-3xl p-8 shadow-xl bg-white/50 backdrop-blur-lg">
        <form action="{{ route('penulis.update', $penulis->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Depan</label>
                    <input type="text" name="nama_depan" value="{{ old('nama_depan', $penulis->nama_depan) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Belakang</label>
                    <input type="text" name="nama_belakang" value="{{ old('nama_belakang', $penulis->nama_belakang) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <input type="text" name="user_name" value="{{ old('user_name', $penulis->user_name) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                    <input type="password" name="password" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all" 
                           placeholder="Kosongkan jika tidak diubah">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil (Opsional)</label>
                @if($penulis->foto)
                    <div class="mb-4">
                        <p class="text-xs text-gray-400 mb-2">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $penulis->foto) }}" class="w-24 h-24 rounded-full object-cover shadow-sm border border-white">
                    </div>
                @endif
                <input type="file" name="foto" accept="image/*"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:outline-none transition-all">
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-gray-100">
                <a href="{{ route('penulis.index') }}" 
                   class="px-6 py-3 rounded-xl text-gray-600 font-semibold hover:bg-gray-100 transition-all">
                    Batal
                </a>
                <button type="submit" 
                        class="px-8 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 transition-all">
                    Update Penulis
                </button>
            </div>
        </form>
    </div>
</div>
@endsection