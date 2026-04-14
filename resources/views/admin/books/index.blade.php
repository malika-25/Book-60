@extends('layouts.app')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Kelola Buku</h2>
        <p class="text-slate-500 font-medium mt-1">Tambah, edit, dan hapus data buku perpustakaan.</p>
    </div>
    <a href="{{ route('books.create') }}" class="btn-primary flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah Buku
    </a>
</div>

<div class="glass-panel overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/70 border-b border-slate-200">
                    <th class="p-4 font-semibold text-slate-600">Buku</th>
                    <th class="p-4 font-semibold text-slate-600 hidden md:table-cell">Kategori</th>
                    <th class="p-4 font-semibold text-slate-600 hidden lg:table-cell">Penulis</th>
                    <th class="p-4 font-semibold text-slate-600">Stok</th>
                    <th class="p-4 font-semibold text-slate-600 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($books as $book)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="p-4">
                        <div class="font-bold text-slate-800">{{ $book->title }}</div>
                        <div class="text-xs text-slate-400 font-medium">{{ $book->isbn }}</div>
                    </td>
                    <td class="p-4 hidden md:table-cell">
                        <span class="px-2 py-1 bg-primary-50 text-primary-700 rounded-lg text-xs font-bold">{{ $book->category->name }}</span>
                    </td>
                    <td class="p-4 hidden lg:table-cell text-slate-600 font-medium text-sm">{{ $book->author }}</td>
                    <td class="p-4">
                        <span class="font-bold {{ $book->stock > 0 ? 'text-green-600' : 'text-red-500' }}">{{ $book->stock }}</span>
                    </td>
                    <td class="p-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('books.edit', $book) }}" class="px-3 py-1.5 bg-slate-50 text-slate-700 border border-slate-200 rounded-lg text-xs font-bold hover:bg-slate-700 hover:text-white transition">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Yakin hapus buku ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-700 border border-red-200 rounded-lg text-xs font-bold hover:bg-red-600 hover:text-white transition">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-10 text-center text-slate-500 font-medium">Belum ada buku. <a href="{{ route('books.create') }}" class="text-primary-600 font-bold hover:underline">Tambah sekarang.</a></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
