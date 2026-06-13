<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | RuangCerita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        .heading-font { font-family: 'Georgia', 'Times New Roman', serif; }
    </style>
</head>
<body class="bg-neutral-50 min-h-screen flex items-center justify-center p-6 text-neutral-800">

    <div class="bg-white w-full max-w-md rounded-[2.5rem] p-10 shadow-sm border border-stone-100">
        @if(session('error'))
            <div class="mb-8 p-4 bg-rose-50 text-rose-800 border border-rose-100 rounded-2xl text-sm font-bold text-center shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-rose-800 heading-font tracking-tight">Masuk.</h1>
            <p class="text-neutral-500 mt-3 font-medium text-sm">Selamat datang kembali di ruang kerja.</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-neutral-700 mb-2">Username</label>
                <input type="text" name="user_name" required 
                       class="w-full px-5 py-4 bg-stone-50 rounded-2xl border border-stone-200 focus:bg-white focus:ring-2 focus:ring-rose-200 focus:border-rose-400 focus:outline-none transition-all text-neutral-700 font-medium">
            </div>

            <div>
                <label class="block text-sm font-bold text-neutral-700 mb-2">Password</label>
                <input type="password" name="password" required 
                       class="w-full px-5 py-4 bg-stone-50 rounded-2xl border border-stone-200 focus:bg-white focus:ring-2 focus:ring-rose-200 focus:border-rose-400 focus:outline-none transition-all text-neutral-700 font-medium">
            </div>

            <button type="submit" 
                    class="w-full py-4 mt-4 bg-rose-800 text-white font-bold rounded-full shadow-md shadow-rose-200 hover:bg-rose-900 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                Masuk ke Dashboard
            </button>
        </form>

        <div class="mt-10 text-center">
            <a href="{{ route('front.index') }}" class="text-sm font-bold text-neutral-400 hover:text-rose-700 transition-colors">&larr; Kembali ke halaman publik</a>
        </div>
    </div>

</body>
</html>