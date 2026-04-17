@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-[70vh]">
        <div class="glass-panel w-full max-w-md p-8 relative overflow-hidden">
            <!-- Decoration -->
            <div
                class="absolute -top-10 -right-10 w-32 h-32 bg-primary-100 rounded-full blur-2xl opacity-60 pointer-events-none">
            </div>
            <div
                class="absolute -bottom-10 -left-10 w-32 h-32 bg-teal-100 rounded-full blur-2xl opacity-60 pointer-events-none">
            </div>

            <div class="relative z-10">
                <h2 class="text-3xl font-black text-center text-slate-800 mb-2">Selamat Datang</h2>
                <p class="text-center text-slate-500 font-medium mb-8">Masuk ke akun MyBook Anda</p>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="glass-input" placeholder="contoh@sastrain.com">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Kata Sandi</label>
                        <input type="password" name="password" required class="glass-input" placeholder="••••••••">
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="w-4 h-4 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                        <label for="remember" class="ml-2 block text-sm font-medium text-slate-600">Ingat Saya</label>
                    </div>

                    <button type="submit" class="btn-primary w-full mt-2 text-lg">Masuk</button>
                </form>

                <p class="mt-6 text-center text-sm font-medium text-slate-600">
                    Belum punya akun? <a href="{{ route('register') }}"
                        class="text-primary-600 hover:text-primary-700 font-bold">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>
@endsection
