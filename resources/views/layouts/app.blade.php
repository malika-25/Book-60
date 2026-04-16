<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BooKeep - Perpustakaan Digital')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex flex-col min-h-screen relative">

    <!-- Animated Background Blobs -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-primary-100/50 blur-[100px]"></div>
        <div class="absolute top-[20%] right-[-5%] w-[30%] h-[50%] rounded-full bg-teal-100/40 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[20%] w-[50%] h-[40%] rounded-full bg-cyan-100/40 blur-[100px]"></div>
    </div>

    <!-- Navbar -->
    <nav class="glass-panel mx-4 mt-4 px-6 py-4 flex justify-between items-center z-50 sticky top-4">
        <div class="flex items-center space-x-4">
            <h1 class="text-2xl font-black text-primary-600 tracking-tight flex items-center gap-2">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                BooKeep
            </h1>
        </div>
        <div class="flex items-center space-x-6">
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-slate-600 hover:text-primary-600 font-semibold transition">Dashboard Admin</a>
                    <a href="{{ route('books.index') }}" class="text-slate-600 hover:text-primary-600 font-semibold transition">Kelola Buku</a>
                    <a href="{{ route('admin.transactions.index') }}" class="text-slate-600 hover:text-primary-600 font-semibold transition">Peminjaman</a>
                @else
                    <a href="{{ route('dashboard') }}" class="text-slate-600 hover:text-primary-600 font-semibold transition">Dashboard</a>
                    <a href="{{ route('user.books') }}" class="text-slate-600 hover:text-primary-600 font-semibold transition">Katalog Buku</a>
                    <a href="{{ route('user.transactions') }}" class="text-slate-600 hover:text-primary-600 font-semibold transition">Peminjaman Saya</a>
                @endif
                <div class="h-6 w-px bg-slate-300"></div>
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 text-slate-700 hover:text-primary-600 transition">
                        <span class="font-bold">{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4" :class="{'rotate-180': open}" style="transition: transform 0.2s;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition.opacity.duration.200ms class="absolute right-0 mt-3 w-48 bg-white/90 backdrop-blur-md rounded-xl shadow-xl py-2 border border-slate-100" style="display: none;">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-5 py-2 text-red-600 font-medium hover:bg-red-50 transition">Keluar</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-slate-600 hover:text-primary-600 font-semibold transition">Masuk</a>
                <a href="{{ route('register') }}" class="btn-primary">Daftar</a>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8 max-w-7xl relative z-10 w-full">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition.opacity.duration.300ms class="mb-6 p-4 rounded-xl bg-teal-50 border border-teal-200 text-teal-800 flex justify-between items-center shadow-sm">
                <span class="font-medium">{{ session('success') }}</span>
                <button @click="show = false" class="text-teal-500 hover:text-teal-700">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 shadow-sm font-medium">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-auto py-8 text-center text-slate-500 text-sm font-medium border-t border-slate-200/60 bg-white/30 backdrop-blur-sm">
        <p>&copy; {{ date('Y') }} <span class="text-primary-600">BooKeep</span> - By Malik Akhdan🧑‍💻.</p>
    </footer>
</body>
</html>
