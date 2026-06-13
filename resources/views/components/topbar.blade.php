<header class="flex justify-between items-center px-8 py-6 border-b border-white/50">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 tracking-tight capitalize">
            @yield('page_title', 'Dashboard')
        </h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data aplikasi blog kamu di sini.</p>
    </div>

    <div class="flex items-center gap-6">
        
        <div class="relative hidden md:block">
            <svg class="w-5 h-5 absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Cari sesuatu..." class="pl-12 pr-6 py-2.5 bg-[#ecf0f3] rounded-full neu-shadow-inset outline-none text-sm text-gray-700 focus:ring-2 focus:ring-purple-400 transition-all w-64 border-none placeholder-gray-400">
        </div>

        <button class="h-10 w-10 rounded-full bg-[#ecf0f3] neu-shadow flex items-center justify-center text-gray-600 hover:text-purple-600 transition-all relative">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            <span class="absolute top-2 right-2 h-2.5 w-2.5 bg-red-500 rounded-full border-2 border-[#ecf0f3]"></span>
        </button>

        <div class="h-11 w-11 rounded-full bg-[#ecf0f3] neu-shadow flex items-center justify-center cursor-pointer border-2 border-white/60">
            <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600">A</span>
        </div>
        
    </div>
</header>