@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h2 class="text-3xl font-black text-slate-800 tracking-tight">Riwayat Peminjaman</h2>
    <p class="text-slate-500 font-medium mt-1">Daftar buku yang Anda pinjam dari perpustakaan.</p>
</div>

<div class="glass-panel overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50/50 border-b border-slate-200">
                <th class="p-4 font-semibold text-slate-600">Buku</th>
                <th class="p-4 font-semibold text-slate-600 hidden md:table-cell">Tgl Pinjam</th>
                <th class="p-4 font-semibold text-slate-600 hidden md:table-cell">Tenggat Kembali</th>
                <th class="p-4 font-semibold text-slate-600">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($transactions as $t)
            <tr class="hover:bg-slate-50/50 transition">
                <td class="p-4">
                    <div class="font-bold text-slate-800">{{ $t->book->title }}</div>
                    <div class="text-sm font-medium text-slate-500">{{ $t->book->author }}</div>
                </td>
                <td class="p-4 hidden md:table-cell text-slate-600 font-medium">{{ $t->borrow_date->format('d M Y') }}</td>
                <td class="p-4 hidden md:table-cell text-slate-600 font-medium">{{ $t->return_date->format('d M Y') }}</td>
                <td class="p-4">
                    @if($t->status === 'pending')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">Menunggu</span>
                    @elseif($t->status === 'borrowed')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">Dipinjam</span>
                    @elseif($t->status === 'returned')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">Selesai</span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">Ditolak</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-8 text-center text-slate-500 font-medium">Belum ada riwayat peminjaman.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
