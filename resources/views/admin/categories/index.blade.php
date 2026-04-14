@extends('layouts.app')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Kelola Kategori</h2>
        <p class="text-slate-500 font-medium mt-1">Tambah dan kelola kategori buku perpustakaan.</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn-primary flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah Kategori
    </a>
</div>

<div class="glass-panel overflow-hidden max-w-2xl">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50/70 border-b border-slate-200">
                <th class="p-4 font-semibold text-slate-600">Nama Kategori</th>
                <th class="p-4 font-semibold text-slate-600">Slug</th>
                <th class="p-4 font-semibold text-slate-600">Jumlah Buku</th>
                <th class="p-4 font-semibold text-slate-600 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($categories as $cat)
            <tr class="hover:bg-slate-50/50 transition">
                <td class="p-4 font-bold text-slate-800">{{ $cat->name }}</td>
                <td class="p-4 font-mono text-xs text-slate-500 bg-slate-50/50">{{ $cat->slug }}</td>
                <td class="p-4 text-slate-600 font-medium">{{ $cat->books->count() }} buku</td>
                <td class="p-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('categories.edit', $cat) }}" class="px-3 py-1.5 bg-slate-50 text-slate-700 border border-slate-200 rounded-lg text-xs font-bold hover:bg-slate-700 hover:text-white transition">Edit</a>
                        <form action="{{ route('categories.destroy', $cat) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Semua buku terkait juga terhapus!')">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-700 border border-red-200 rounded-lg text-xs font-bold hover:bg-red-600 hover:text-white transition">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-10 text-center text-slate-500 font-medium">Belum ada kategori. <a href="{{ route('categories.create') }}" class="text-primary-600 font-bold hover:underline">Tambah sekarang.</a></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
