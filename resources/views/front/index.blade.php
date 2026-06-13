@extends('layouts.front')

@section('content')
<div class="max-w-6xl mx-auto">

    <div class="mb-12 flex flex-wrap justify-center gap-3">
        <a href="{{ route('front.index') }}" class="px-6 py-2.5 rounded-full border border-rose-200 text-sm font-semibold transition-all shadow-sm {{ !request()->has('kategori') ? 'bg-rose-100 text-rose-800 border-rose-300' : 'bg-white text-neutral-500 hover:border-rose-400 hover:text-rose-700' }}">
            Semua Cerita
        </a>
        @foreach ($kategoriList as $kat)
            <a href="{{ route('front.index', ['kategori' => $kat->id]) }}" class="px-6 py-2.5 rounded-full border border-rose-200 text-sm font-semibold transition-all shadow-sm {{ request('kategori') == $kat->id ? 'bg-rose-100 text-rose-800 border-rose-300' : 'bg-white text-neutral-500 hover:border-rose-400 hover:text-rose-700' }}">
                {{ $kat->nama_kategori }}
            </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse ($artikel as $item)
            <div class="group flex flex-col bg-white rounded-[2.5rem] p-5 border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-500">
                <a href="{{ route('front.show', $item->id) }}" class="block overflow-hidden rounded-[2rem] mb-6 relative">
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}" class="w-full aspect-[4/3] object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                    @else
                        <div class="w-full aspect-[4/3] bg-rose-50 flex items-center justify-center text-rose-200 group-hover:bg-rose-100 transition-colors duration-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <span class="absolute top-4 left-4 text-xs font-bold text-rose-900 bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full shadow-sm">
                        {{ $item->kategori->nama_kategori ?? 'Inspirasi' }}
                    </span>
                </a>
                
                <h3 class="text-2xl font-bold text-neutral-900 leading-snug group-hover:text-rose-800 transition-colors mb-3 px-2" style="font-family: 'Georgia', serif;">
                    <a href="{{ route('front.show', $item->id) }}">{{ $item->judul }}</a>
                </h3>
                <p class="text-neutral-500 line-clamp-2 text-sm mb-6 px-2 leading-relaxed">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                
                <div class="mt-auto flex items-center justify-between text-xs font-medium text-neutral-400 border-t border-stone-100 pt-5 px-2">
                    <span class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center font-bold">{{ substr($item->penulis->nama_depan ?? 'H', 0, 1) }}</span>
                        {{ $item->penulis->nama_depan ?? 'Hani' }}
                    </span>
                    <span>{{ $item->created_at->format('d M Y') }}</span>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-24 bg-white rounded-[3rem] border border-stone-100 shadow-sm">
                <p class="text-neutral-500 italic text-lg font-medium">Belum ada cerita yang diukir hari ini.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection