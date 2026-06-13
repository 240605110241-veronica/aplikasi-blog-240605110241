<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Cerita Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tipografi tambahan untuk kesan elegan (asumsinya pakai font bawaan browser yang clean) */
        body { font-family: 'Georgia', 'Times New Roman', serif; } /* Gunakan Serif untuk kesan elegan & girly dewasa */
        .article-font { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; } /* Font Sans untuk teks panjang agar mudah dibaca */
    
        /* Styling khusus agar Tailwind prose (untuk isi artikel) lebih aesthetic */
        .prose { color: #525252; max-width: none; line-height: 1.9; }
        .prose h1, .prose h2, .prose h3 { font-family: 'Georgia', serif; font-weight: 700; color: #171717; margin-bottom: 0.5em; }
        .prose p { margin-bottom: 1.5em; }
        .prose a { color: #be123c; font-weight: 600; text-decoration: underline; }
    </style>
</head>
<body class="bg-neutral-50 min-h-screen flex flex-col article-font text-neutral-800">

    <nav class="bg-white sticky top-0 z-50 shadow-sm border-b border-stone-100">
        <div class="container mx-auto px-6 py-5 flex justify-between items-center">
            <a href="{{ route('front.index') }}" class="text-3xl font-extrabold tracking-tighter text-rose-800 hover:text-rose-900 transition" style="font-family: 'Georgia', serif;">RuangCerita</a>
            <div class="space-x-8 flex items-center">
                <a href="{{ route('front.index') }}" class="font-medium text-neutral-600 hover:text-rose-800 transition">Beranda</a>
                <a href="{{ url('/login') }}" class="border-2 border-rose-800 text-rose-800 px-6 py-2 rounded-full font-bold hover:bg-rose-800 hover:text-white transition-all duration-300">Admin</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-12 px-6 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-stone-100 border-t border-stone-200 text-center p-10 mt-16 text-neutral-600 font-medium">
        <p>&copy; 2026 RuangCerita Publikasi. Dikurasi dengan cinta.</p>
    </footer>

</body>
</html>