@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Katalog Buku</h2>
        <p class="text-slate-500 font-medium mt-1">Cari dan temukan buku menarik di BooKeep</p>
    </div>
    
    <form action="{{ route('user.books') }}" method="GET" class="w-full md:w-96 relative">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul atau penulis..." class="glass-input pl-11">
        <svg class="w-5 h-5 absolute left-4 top-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
    </form>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($books as $book)
    <div class="glass-panel group hover:border-primary-300 transition-all duration-300 overflow-hidden flex flex-col h-full">
        <div class="h-48 bg-slate-100 relative overflow-hidden flex items-center justify-center p-4">
            @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" class="max-h-full max-w-full object-cover rounded shadow-md group-hover:scale-105 transition-transform duration-500">
            @else
                <div class="w-24 h-32 bg-slate-200 rounded shadow-md flex items-center justify-center text-slate-400 group-hover:scale-105 transition-transform duration-500 text-xs text-center font-bold px-2">No Cover</div>
            @endif
            
            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full shadow-sm {{ $book->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $book->stock > 0 ? 'Stok: '.$book->stock : 'Habis' }}
            </div>
            
            <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full shadow-sm text-primary-700">
                {{ $book->category->name }}
            </div>
        </div>
        
        <div class="p-5 flex-grow flex flex-col">
            <h3 class="text-lg font-bold text-slate-800 leading-tight mb-1 group-hover:text-primary-600 transition">{{ $book->title }}</h3>
            <p class="text-sm font-medium text-slate-500 mb-4">{{ $book->author }}</p>
            
            <div class="mt-auto">
                <form action="{{ route('user.borrow', $book) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-center py-2.5 rounded-xl font-bold transition-all disabled:opacity-50 disabled:cursor-not-allowed {{ $book->stock > 0 ? 'bg-primary-50 text-primary-700 hover:bg-primary-600 hover:text-white border border-primary-200 hover:border-primary-600' : 'bg-slate-100 text-slate-400 border border-slate-200' }}" {{ $book->stock <= 0 ? 'disabled' : '' }}>
                        {{ $book->stock > 0 ? 'Pinjam Buku' : 'Stok Habis' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full py-20 text-center glass-panel">
        <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
        <h3 class="text-xl font-bold text-slate-600">Tidak ada buku ditemukan</h3>
        <p class="text-slate-500 mt-2">Coba kata kunci pencarian yang lain.</p>
    </div>
    @endforelse
</div>

<div class="mt-8">
    {{ $books->links() }}
</div>
@endsection
