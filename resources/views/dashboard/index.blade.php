@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-14">
    
    <div class="bg-rose-50 rounded-[2rem] p-8 border border-rose-100 flex flex-col justify-between transition-transform hover:-translate-y-1 duration-300 shadow-sm">
        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-rose-700 shadow-sm mb-6 rotate-3">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20"></path></svg>
        </div>
        <div>
            <p class="text-xs font-bold text-rose-900/60 uppercase tracking-widest mb-1">Total Artikel</p>
            <h3 class="text-5xl font-extrabold text-rose-900 heading-font">{{ $totalArtikel ?? 4 }}</h3>
        </div>
    </div>

    <div class="bg-stone-50 rounded-[2rem] p-8 border border-stone-200 flex flex-col justify-between transition-transform hover:-translate-y-1 duration-300 shadow-sm">
        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-stone-700 shadow-sm mb-6 -rotate-3">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        </div>
        <div>
            <p class="text-xs font-bold text-stone-500 uppercase tracking-widest mb-1">Penulis Aktif</p>
            <h3 class="text-5xl font-extrabold text-stone-800 heading-font">{{ $totalPenulis ?? 2 }}</h3>
        </div>
    </div>

    <div class="bg-emerald-50 rounded-[2rem] p-8 border border-emerald-100 flex flex-col justify-between transition-transform hover:-translate-y-1 duration-300 shadow-sm">
        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-emerald-700 shadow-sm mb-6 rotate-3">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
        </div>
        <div>
            <p class="text-xs font-bold text-emerald-900/60 uppercase tracking-widest mb-1">Kategori</p>
            <h3 class="text-5xl font-extrabold text-emerald-900 heading-font">{{ $totalKategori ?? 4 }}</h3>
        </div>
    </div>

</div>

<div class="flex justify-between items-end mb-6 px-2">
    <h3 class="text-2xl font-bold text-neutral-900 heading-font">Riwayat Cerita</h3>
    <a href="{{ route('artikel.index') }}" class="text-sm font-bold text-rose-700 hover:text-rose-900 transition-colors">Lihat Semua &rarr;</a>
</div>

<div class="overflow-x-auto pb-4">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th>Judul Artikel</th>
                <th>Kategori</th>
                <th>Status</th>
                <th class="text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Asumsi data dilempar dari controller dengan nama variabel $artikelTerbaru --}}
            @forelse ($artikelTerbaru ?? [] as $item)
            <tr class="group">
                <td class="font-bold text-neutral-800 heading-font text-lg">{{ $item->judul }}</td>
                <td>
                    <span class="bg-rose-50 text-rose-700 px-3.5 py-1.5 rounded-full text-xs font-bold border border-rose-100">
                        {{ $item->kategori->nama_kategori ?? 'Umum' }}
                    </span>
                </td>
                <td>
                    <span class="flex items-center gap-2 text-sm text-neutral-500 font-medium">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-sm"></span> Publik
                    </span>
                </td>
                <td class="text-right">
                    <a href="{{ route('artikel.edit', $item->id) }}" class="text-sm font-bold text-stone-400 hover:text-rose-700 transition">Edit Draft</a>
                </td>
            </tr>
            @empty
            <tr class="group">
                <td class="font-bold text-neutral-800 heading-font text-lg">dvcxdf</td>
                <td><span class="bg-rose-50 text-rose-700 px-3.5 py-1.5 rounded-full text-xs font-bold border border-rose-100">Folklore</span></td>
                <td><span class="flex items-center gap-2 text-sm text-neutral-500 font-medium"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-sm"></span> Tampil</span></td>
                <td class="text-right"><a href="#" class="text-sm font-bold text-stone-400 hover:text-rose-700 transition">Edit</a></td>
            </tr>
            <tr class="group">
                <td class="font-bold text-neutral-800 heading-font text-lg">asdads</td>
                <td><span class="bg-rose-50 text-rose-700 px-3.5 py-1.5 rounded-full text-xs font-bold border border-rose-100">Folklore</span></td>
                <td><span class="flex items-center gap-2 text-sm text-neutral-500 font-medium"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-sm"></span> Tampil</span></td>
                <td class="text-right"><a href="#" class="text-sm font-bold text-stone-400 hover:text-rose-700 transition">Edit</a></td>
            </tr>
            <tr class="group">
                <td class="font-bold text-neutral-800 heading-font text-lg">Yakali ga keren</td>
                <td><span class="bg-rose-50 text-rose-700 px-3.5 py-1.5 rounded-full text-xs font-bold border border-rose-100">Folklore</span></td>
                <td><span class="flex items-center gap-2 text-sm text-neutral-500 font-medium"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-sm"></span> Tampil</span></td>
                <td class="text-right"><a href="#" class="text-sm font-bold text-stone-400 hover:text-rose-700 transition">Edit</a></td>
            </tr>
            <tr class="group">
                <td class="font-bold text-neutral-800 heading-font text-lg">Saya Manusia</td>
                <td><span class="bg-stone-50 text-stone-700 px-3.5 py-1.5 rounded-full text-xs font-bold border border-stone-200">Pop Jazz</span></td>
                <td><span class="flex items-center gap-2 text-sm text-neutral-500 font-medium"><span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-sm"></span> Tampil</span></td>
                <td class="text-right"><a href="#" class="text-sm font-bold text-stone-400 hover:text-rose-700 transition">Edit</a></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection