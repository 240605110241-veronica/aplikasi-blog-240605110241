@extends('layouts.front')

@section('content')
<article class="max-w-4xl mx-auto bg-white rounded-[3rem] p-8 md:p-16 shadow-sm border border-stone-100 mb-20">
    
    <div class="text-center mb-10">
        <span class="text-xs font-bold text-rose-700 tracking-wider uppercase bg-rose-50 border border-rose-100 px-5 py-2 rounded-full inline-block mb-6 shadow-sm">
            {{ $artikel->kategori->nama_kategori ?? 'Inspirasi' }}
        </span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-neutral-900 mt-2 leading-tight" style="font-family: 'Georgia', serif;">{{ $artikel->judul }}</h1>
        <div class="flex items-center justify-center gap-3 text-sm text-neutral-500 mt-8 font-medium">
            <span>Ditulis oleh <span class="text-rose-700">{{ $artikel->penulis->nama_depan ?? 'Hani' }}</span></span>
            <span class="w-1.5 h-1.5 rounded-full bg-rose-200"></span>
            <span>{{ $artikel->created_at->format('d M Y') }}</span>
        </div>
    </div>
    
    @if($artikel->gambar)
        <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full rounded-[2rem] mb-12 object-cover max-h-[500px] shadow-md border border-stone-100">
    @endif

    <div class="prose max-w-none text-neutral-700 leading-relaxed text-lg prose-rose prose-lg md:px-8">
        {!! $artikel->isi !!}
    </div>

    <div class="mt-20 pt-10 border-t border-stone-100 text-center">
        <a href="{{ route('front.index') }}" class="inline-flex items-center text-rose-700 font-bold hover:text-rose-900 transition-all px-8 py-3.5 bg-rose-50 border border-rose-100 rounded-full hover:bg-rose-100 hover:shadow-sm">
            <span class="mr-3 text-lg">&larr;</span> Kembali ke Beranda
        </a>
    </div>
</article>

@if($artikelTerkait->count() > 0)
<div class="max-w-5xl mx-auto mb-10">
    <h3 class="text-2xl font-bold text-neutral-900 mb-10 text-center" style="font-family: 'Georgia', serif;">Cerita Lainnya yang Mungkin Kamu Suka</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($artikelTerkait->take(3) as $terkait)
        <a href="{{ route('front.show', $terkait->id) }}" class="group block bg-white p-5 rounded-[2rem] border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-300">
            @if($terkait->gambar)
                <img src="{{ asset('storage/'.$terkait->gambar) }}" alt="{{ $terkait->judul }}" class="w-full aspect-video object-cover rounded-[1.5rem] mb-5 group-hover:opacity-90 transition">
            @else
                <div class="w-full aspect-video bg-rose-50 rounded-[1.5rem] mb-5"></div>
            @endif
            <h4 class="font-bold text-neutral-800 group-hover:text-rose-800 transition line-clamp-2 leading-snug text-lg mb-2" style="font-family: 'Georgia', serif;">{{ $terkait->judul }}</h4>
            <p class="text-xs text-neutral-400 font-medium">{{ $terkait->created_at->format('d M Y') }}</p>
        </a>
        @endforeach
    </div>
</div>
@endif
@endsection