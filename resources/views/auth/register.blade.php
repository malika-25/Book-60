@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-[70vh]">
    <div class="glass-panel w-full max-w-lg p-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-40 h-40 bg-primary-100 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-40 h-40 bg-teal-100 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
        
        <div class="relative z-10">
            <h2 class="text-3xl font-black text-center text-slate-800 mb-2">Buat Akun Baru</h2>
            <p class="text-center text-slate-500 font-medium mb-8">Gabung ke BooKeep untuk mulai meminjam</p>
            
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus class="glass-input" placeholder="Nama Anda">
                    @error('name')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">NIS / ID Siswa</label>
                    <input type="text" name="student_id" value="{{ old('student_id') }}" required class="glass-input" placeholder="12345678">
                    @error('student_id')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="glass-input" placeholder="email@sekolah.com">
                    @error('email')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Kata Sandi</label>
                        <input type="password" name="password" required class="glass-input" placeholder="••••••••">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Ulangi Sandi</label>
                        <input type="password" name="password_confirmation" required class="glass-input" placeholder="••••••••">
                    </div>
                </div>
                @error('password')<span class="text-xs text-red-500 font-medium">{{ $message }}</span>@enderror
                
                <button type="submit" class="btn-primary w-full mt-4 text-lg">Daftar</button>
            </form>
            
            <p class="mt-6 text-center text-sm font-medium text-slate-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-primary-600 hover:text-primary-700 font-bold">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection
