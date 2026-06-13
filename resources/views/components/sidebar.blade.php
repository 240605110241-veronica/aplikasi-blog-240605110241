<aside class="w-64 glass rounded-3xl p-6 flex flex-col h-full neu-shadow transition-all duration-300">
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500 tracking-wider">
            Aditya'sWeb.
        </h2>
    </div>

    <nav class="flex-1 space-y-4">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-4 p-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-white/60 text-purple-700 neu-shadow font-bold' : 'text-gray-600 hover:bg-white/40 hover:text-purple-600 hover:neu-shadow transition-all font-medium' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>

        <a href="{{ route('artikel.index') }}" class="flex items-center gap-4 p-3 rounded-xl {{ request()->routeIs('artikel.*') ? 'bg-white/60 text-purple-700 neu-shadow font-bold' : 'text-gray-600 hover:bg-white/40 hover:text-purple-600 hover:neu-shadow transition-all font-medium' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
            Artikel
        </a>

        <a href="{{ route('penulis.index') }}" class="flex items-center gap-4 p-3 rounded-xl {{ request()->routeIs('penulis.*') ? 'bg-white/60 text-purple-700 neu-shadow font-bold' : 'text-gray-600 hover:bg-white/40 hover:text-purple-600 hover:neu-shadow transition-all font-medium' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            Penulis
        </a>

        <a href="{{ route('kategori.index') }}" class="flex items-center gap-4 p-3 rounded-xl {{ request()->routeIs('kategori.*') ? 'bg-white/60 text-purple-700 neu-shadow font-bold' : 'text-gray-600 hover:bg-white/40 hover:text-purple-600 hover:neu-shadow transition-all font-medium' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            Kategori
        </a>
    </nav>

    <div class="mt-auto pt-6 border-t border-white/50">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 p-3 rounded-xl text-red-500 font-bold hover:bg-red-50 hover:neu-shadow transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </button>
        </form>
    </div>
</aside>