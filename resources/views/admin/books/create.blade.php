@extends('layouts.app')

@section('content')
<div class="mb-8 flex items-center gap-4">
    <a href="{{ route('books.index') }}" class="p-2 rounded-xl bg-white/70 border border-slate-200 text-slate-500 hover:text-slate-800 hover:bg-white transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Tambah Buku Baru</h2>
        <p class="text-slate-500 font-medium mt-0.5">Isi detail buku untuk ditambahkan ke koleksi.</p>
    </div>
</div>

<div class="glass-panel max-w-2xl p-8">
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Judul Buku <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required class="glass-input" placeholder="Judul Buku">
                @error('title')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Penulis <span class="text-red-500">*</span></label>
                <input type="text" name="author" value="{{ old('author') }}" required class="glass-input" placeholder="Nama Penulis">
                @error('author')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Penerbit <span class="text-red-500">*</span></label>
                <input type="text" name="publisher" value="{{ old('publisher') }}" required class="glass-input" placeholder="Nama Penerbit">
                @error('publisher')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">ISBN</label>
                <input type="text" name="isbn" value="{{ old('isbn') }}" class="glass-input" placeholder="978-xxx-xxx">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Tahun Terbit <span class="text-red-500">*</span></label>
                <input type="number" name="published_year" value="{{ old('published_year') }}" required class="glass-input" placeholder="2024">
                @error('published_year')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Stok <span class="text-red-500">*</span></label>
                <input type="number" name="stock" value="{{ old('stock', 1) }}" required min="0" class="glass-input" placeholder="10">
                @error('stock')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                <select name="category_id" required class="glass-input">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4" class="glass-input resize-none" placeholder="Sinopsis singkat buku...">{{ old('description') }}</textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Cover Buku</label>
                <input type="file" name="cover_image" accept="image/*" class="glass-input py-2.5 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition">
            </div>
        </div>
        
        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="btn-primary">Simpan Buku</button>
            <a href="{{ route('books.index') }}" class="font-semibold text-slate-600 hover:text-slate-800 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
