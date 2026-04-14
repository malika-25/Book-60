@extends('layouts.app')

@section('content')
<div class="mb-8 flex items-center gap-4">
    <a href="{{ route('categories.index') }}" class="p-2 rounded-xl bg-white/70 border border-slate-200 text-slate-500 hover:text-slate-800 hover:bg-white transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Tambah Kategori</h2>
    </div>
</div>

<div class="glass-panel max-w-md p-8">
    <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Kategori <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus class="glass-input" placeholder="misal: Fiksi, Sains, Sejarah...">
            @error('name')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
        </div>
        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="{{ route('categories.index') }}" class="font-semibold text-slate-600 hover:text-slate-800 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
