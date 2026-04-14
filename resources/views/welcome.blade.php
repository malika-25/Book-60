@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[70vh] text-center">
        <!-- Icon/Logo Display -->
        <div
            class="w-28 h-28 bg-white/50 backdrop-blur-xl rounded-full flex items-center justify-center text-primary-500 mb-8 shadow-[0_0_40px_rgba(20,184,166,0.3)] border border-white/40">
            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                </path>
            </svg>
        </div>

        <h1 class="text-5xl md:text-7xl font-black text-slate-800 tracking-tighter mb-6">
            Membaca Menjadi <br />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-teal-400">Lebih
                Menyenangkan</span>
        </h1>

        <p class="text-xl text-slate-600 font-medium max-w-2xl mb-12 leading-relaxed">
            BooKeep adalah platform perpustakaan digital sekolah modern yang dirancang khusus untuk mewujudkan ekosistem
            literasi yang interaktif.
        </p>

        <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6">
            @auth
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                    class="btn-primary text-lg px-8 py-4 w-full sm:w-auto">Ke Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-primary text-lg px-10 py-4 w-full sm:w-auto">Mulai Membaca</a>
                <a href="{{ route('register') }}"
                    class="bg-white/80 backdrop-blur text-slate-700 hover:text-primary-600 font-bold text-lg px-10 py-4 rounded-xl shadow-sm border border-slate-200 hover:border-primary-300 transition hover:-translate-y-1 w-full sm:w-auto">Daftar
                    Akun Baru</a>
            @endauth
        </div>
    </div>
@endsection