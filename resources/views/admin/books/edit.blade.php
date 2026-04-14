@extends('layouts.app')

@section('content')
<div class="mb-8 flex items-center gap-4">
    <a href="{{ route('books.index') }}" class="p-2 rounded-xl bg-white/70 border border-slate-200 text-slate-500 hover:text-slate-800 hover:bg-white transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Edit Buku</h2>
        <p class="text-slate-500 font-medium mt-0.5">Ubah informasi buku: <span class="font-bold text-primary-600">{{ $book->title }}</span></p>
    </div>
</div>

<div class="glass-panel max-w-2xl p-8">
    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Judul Buku <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $book->title) }}" required class="glass-input">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Penulis <span class="text-red-500">*</span></label>
                <input type="text" name="author" value="{{ old('author', $book->author) }}" required class="glass-input">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Penerbit <span class="text-red-500">*</span></label>
                <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" required class="glass-input">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">ISBN</label>
                <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" class="glass-input">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Tahun Terbit <span class="text-red-500">*</span></label>
                <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}" required class="glass-input">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Stok <span class="text-red-500">*</span></label>
                <input type="number" name="stock" value="{{ old('stock', $book->stock) }}" required min="0" class="glass-input">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                <select name="category_id" required class="glass-input">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $book->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4" class="glass-input resize-none">{{ old('description', $book->description) }}</textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Cover Buku (biarkan kosong jika tidak ingin mengubah)</label>
                @if($book->cover_image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover saat ini" class="h-24 rounded-lg shadow-md object-cover">
                    </div>
                @endif
                <input type="file" name="cover_image" accept="image/*" class="glass-input py-2.5 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition">
            </div>
        </div>
        
        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="btn-primary">Simpan Perubahan</button>
            <a href="{{ route('books.index') }}" class="font-semibold text-slate-600 hover:text-slate-800 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
