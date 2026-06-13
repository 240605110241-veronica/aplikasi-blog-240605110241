<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Workspace') | RuangCerita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        .heading-font { font-family: 'Georgia', 'Times New Roman', serif; }
        
        /* Auto-styling tabel CRUD bawaan agar serasi dengan layout grid pengguna */
        table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 1.5rem; }
        th { background-color: #fff5f5; color: #9f1239; font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em; padding: 1.25rem 1rem; border-bottom: 2px solid #fecdd3; text-align: left; }
        th:first-child { border-top-left-radius: 1.25rem; border-bottom-left-radius: 1.25rem; }
        th:last-child { border-top-right-radius: 1.25rem; border-bottom-right-radius: 1.25rem; }
        td { padding: 1.25rem 1rem; border-bottom: 1px solid #f5f5f4; color: #404040; font-size: 0.9rem; font-weight: 500; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background-color: #fafaf9; }
        
        /* Auto-styling komponen Form Input di dalam view CRUD admin */
        input[type="text"], input[type="password"], input[type="email"], select, textarea {
            width: 100%; padding: 0.875rem 1.25rem; background-color: #stone-50; border: 1px solid #e7e5e4; border-radius: 1.25rem; transition: all 0.3s; font-weight: 500; color: #444;
        }
        input[type="text"]:focus, input[type="password"]:focus, select:focus, textarea:focus {
            background-color: #fff; border-color: #be123c; box-shadow: 0 0 0 4px #ffe4e6; outline: none;
        }
    </style>
</head>
<body class="bg-neutral-50 min-h-screen flex flex-col text-neutral-800">

    <nav class="bg-white sticky top-0 z-50 shadow-sm border-b border-stone-100">
        <div class="max-w-6xl mx-auto px-6 py-5 flex flex-col md:flex-row justify-between items-center gap-4">
            
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-3xl font-extrabold tracking-tighter text-rose-800 heading-font">RuangCerita</a>
                <span class="text-[10px] font-bold text-rose-700 bg-rose-50 border border-rose-100 px-2.5 py-0.5 rounded-md uppercase tracking-widest">Workspace</span>
            </div>
            
            <div class="flex flex-wrap items-center justify-center gap-1 md:gap-2 font-semibold text-sm text-neutral-600">
                <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-full transition-all {{ request()->routeIs('dashboard') ? 'bg-rose-50 text-rose-800 shadow-inner' : 'hover:text-rose-800 hover:bg-stone-50' }}">Dashboard</a>
                <a href="{{ route('artikel.index') }}" class="px-5 py-2.5 rounded-full transition-all {{ request()->routeIs('artikel.*') ? 'bg-rose-50 text-rose-800 shadow-inner' : 'hover:text-rose-800 hover:bg-stone-50' }}">Artikel</a>
                <a href="{{ route('kategori.index') }}" class="px-5 py-2.5 rounded-full transition-all {{ request()->routeIs('kategori.*') ? 'bg-rose-50 text-rose-800 shadow-inner' : 'hover:text-rose-800 hover:bg-stone-50' }}">Kategori</a>
                <a href="{{ route('penulis.index') }}" class="px-5 py-2.5 rounded-full transition-all {{ request()->routeIs('penulis.*') ? 'bg-rose-50 text-rose-800 shadow-inner' : 'hover:text-rose-800 hover:bg-stone-50' }}">Penulis</a>
                <a href="{{ route('front.index') }}" target="_blank" class="px-4 py-2 rounded-full text-neutral-400 hover:text-neutral-600 transition flex items-center gap-1 font-medium">Pratinjau Situs ↗</a>
            </div>

            <div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="border border-stone-200 text-neutral-500 px-5 py-2 rounded-full font-bold text-xs hover:border-rose-700 hover:text-rose-700 hover:bg-rose-50/50 transition-all duration-300 shadow-sm">
                        Keluar Sesi
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl w-full mx-auto mt-12 px-6 flex-grow mb-24">
        
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 px-2">
            <div>
                <h2 class="text-3xl font-extrabold text-neutral-900 tracking-tight heading-font">@yield('title', 'Ringkasan Kerja')</h2>
                <p class="text-sm text-neutral-400 mt-1 font-medium">Panel kurasi konten, manajemen kategori, dan data penulis.</p>
            </div>
            
            @if(session('success'))
                <div class="p-3 px-5 bg-emerald-50 border border-emerald-100 text-emerald-800 text-xs font-bold rounded-full shadow-sm">
                    ✨ {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="bg-white rounded-[2.5rem] p-8 md:p-12 border border-stone-100 shadow-sm">
            @yield('content')
        </div>

 main>

    <footer class="bg-stone-100 border-t border-stone-200 text-center p-8 text-neutral-500 text-sm font-medium">
        <p>&copy; 2026 RuangCerita Workspace. Sistem dikurasi dengan baik.</p>
    </footer>

</body>
</html>