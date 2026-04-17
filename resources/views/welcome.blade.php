@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[70vh] text-center">
        <h1 class="text-5xl md:text-7xl font-black text-slate-800 tracking-tighter mb-6">
            Membaca Menjadi <br />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-teal-400">Lebih
                Menyenangkan</span>
        </h1>

        <p class="text-xl text-slate-600 font-medium max-w-2xl mb-12 leading-relaxed">
            MyBook adalah platform perpustakaan digital sekolah modern yang dirancang khusus untuk menyimpan buku dan
            mewujudkan ekosistem
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
