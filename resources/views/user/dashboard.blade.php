@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h2 class="text-3xl font-black text-slate-800 tracking-tight">Halo, {{ auth()->user()->name }}!</h2>
    <p class="text-slate-500 font-medium mt-1">Selamat datang di perpustakaan digital BooKeep.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <a href="{{ route('user.books') }}" class="glass-panel p-8 group border border-transparent hover:border-primary-300 transition-all flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-primary-600 transition">Jelajahi Katalog</h3>
            <p class="text-slate-500 font-medium">Temukan buku-buku menarik untuk dipinjam.</p>
        </div>
        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center text-primary-600 group-hover:scale-110 transition transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </div>
    </a>
    
    <a href="{{ route('user.transactions') }}" class="glass-panel p-8 group border border-transparent hover:border-teal-300 transition-all flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-teal-600 transition">Peminjaman Saya</h3>
            <p class="text-slate-500 font-medium">Lihat status buku yang Anda pinjam.</p>
        </div>
        <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center text-teal-600 group-hover:scale-110 transition transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
        </div>
    </a>
</div>
@endsection
