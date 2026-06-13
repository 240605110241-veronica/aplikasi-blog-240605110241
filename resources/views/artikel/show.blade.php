@extends('layouts.app')

@section('title', $artikel->judul)
@section('page_title', 'Detail Artikel')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="mb-6">
        <a href="{{ route('artikel.index') }}" class="text-gray-500 hover:text-purple-600 font-semibold transition-all flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Kembali ke Daftar
        </a>
    </div>

    <div class="glass rounded-3xl overflow-hidden shadow-2xl bg-white/50 backdrop-blur-lg">
        @if($artikel->gambar)
            <div class="w-full h-80 overflow-hidden">
                <img src="{{ asset('storage/' . $artikel->gambar) }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="p-8 md:p-12">
            <div class="mb-6">
                <span class="inline-block px-3 py-1 rounded-full bg-purple-100 text-purple-600 text-xs font-bold uppercase tracking-wider mb-4">
                    {{ $artikel->kategori->nama_kategori ?? 'Umum' }}
                </span>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4 leading-tight">{{ $artikel->judul }}</h1>
                <div class="flex items-center text-gray-500 text-sm">
                    <span class="font-semibold text-purple-700">{{ $artikel->penulis->nama_depan ?? 'Anonim' }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ \Carbon\Carbon::parse($artikel->hari_tanggal)->format('d M Y') }}</span>
                </div>
            </div>

            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                {{ $artikel->isi }}
            </div>

            <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end gap-4">
                <a href="{{ route('artikel.edit', $artikel->id) }}" 
                   class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all">
                   Edit Artikel
                </a>
            </div>
        </div>
    </div>
</div>
@endsection