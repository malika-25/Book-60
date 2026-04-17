@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Dashboard Admin</h2>
        <p class="text-slate-500 font-medium mt-1">Ringkasan aktivitas MyBook hari ini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="glass-panel p-6 border-l-4 border-l-primary-500">
            <h3 class="text-lg font-semibold text-slate-700">Total Buku</h3>
            <p class="text-4xl font-black text-primary-600 mt-2">{{ \App\Models\Book::count() }}</p>
        </div>
        <div class="glass-panel p-6 border-l-4 border-l-teal-500">
            <h3 class="text-lg font-semibold text-slate-700">Total Peminjaman Aktif</h3>
            <p class="text-4xl font-black text-teal-600 mt-2">
                {{ \App\Models\Transaction::where('status', 'borrowed')->count() }}</p>
        </div>
        <div class="glass-panel p-6 border-l-4 border-l-amber-500">
            <h3 class="text-lg font-semibold text-slate-700">Menunggu Persetujuan</h3>
            <p class="text-4xl font-black text-amber-600 mt-2">
                {{ \App\Models\Transaction::where('status', 'pending')->count() }}</p>
        </div>
    </div>

    <div class="glass-panel p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-slate-800">Aksi Cepat</h3>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('books.create') }}"
                class="p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-primary-300 hover:bg-primary-50 transition text-center group">
                <div
                    class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-sm group-hover:scale-110 transition">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <span class="font-semibold text-slate-700">Tambah Buku</span>
            </a>
            <a href="{{ route('categories.index') }}"
                class="p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-primary-300 hover:bg-primary-50 transition text-center group">
                <div
                    class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-sm group-hover:scale-110 transition">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                </div>
                <span class="font-semibold text-slate-700">Kelola Kategori</span>
            </a>
            <a href="{{ route('admin.transactions.index') }}"
                class="p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-primary-300 hover:bg-primary-50 transition text-center group">
                <div
                    class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-sm group-hover:scale-110 transition">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <span class="font-semibold text-slate-700">Validasi Peminjaman</span>
            </a>
        </div>
    </div>
@endsection
