@extends('layouts.app')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Semua Peminjaman</h2>
        <p class="text-slate-500 font-medium mt-1">Kelola semua permintaan peminjaman buku di sini.</p>
    </div>
</div>

<div class="glass-panel overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/70 border-b border-slate-200">
                    <th class="p-4 font-semibold text-slate-600">Siswa</th>
                    <th class="p-4 font-semibold text-slate-600">Buku</th>
                    <th class="p-4 font-semibold text-slate-600 hidden lg:table-cell">Tgl Pinjam</th>
                    <th class="p-4 font-semibold text-slate-600 hidden lg:table-cell">Tenggat</th>
                    <th class="p-4 font-semibold text-slate-600">Status</th>
                    <th class="p-4 font-semibold text-slate-600 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($transactions as $t)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="p-4">
                        <div class="font-bold text-slate-800">{{ $t->user->name }}</div>
                        <div class="text-xs font-medium text-slate-400">{{ $t->user->student_id }}</div>
                    </td>
                    <td class="p-4">
                        <div class="font-semibold text-slate-700">{{ $t->book->title }}</div>
                        <div class="text-xs font-medium text-slate-400">{{ $t->book->author }}</div>
                    </td>
                    <td class="p-4 hidden lg:table-cell text-slate-600 font-medium text-sm">{{ $t->borrow_date->format('d M Y') }}</td>
                    <td class="p-4 hidden lg:table-cell text-slate-600 font-medium text-sm">{{ $t->return_date->format('d M Y') }}</td>
                    <td class="p-4">
                        @if($t->status === 'pending')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">Menunggu</span>
                        @elseif($t->status === 'borrowed')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">Dipinjam</span>
                        @elseif($t->status === 'returned')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">Dikembalikan</span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">Ditolak</span>
                        @endif
                    </td>
                    <td class="p-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            @if($t->status === 'pending')
                                <form action="{{ route('admin.transactions.approve', $t) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="px-3 py-1.5 bg-blue-50 text-blue-700 border border-blue-200 rounded-lg text-xs font-bold hover:bg-blue-600 hover:text-white transition">Setujui</button>
                                </form>
                            @elseif($t->status === 'borrowed')
                                <form action="{{ route('admin.transactions.return', $t) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="px-3 py-1.5 bg-green-50 text-green-700 border border-green-200 rounded-lg text-xs font-bold hover:bg-green-600 hover:text-white transition">Kembalikan</button>
                                </form>
                            @else
                                <span class="text-xs text-slate-400 font-medium italic">Selesai</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-10 text-center text-slate-500 font-medium">Belum ada transaksi peminjaman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
