<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Admin index
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->orderBy('created_at', 'desc')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    // Admin approve
    public function approve(Transaction $transaction)
    {
        if ($transaction->status !== 'pending') {
            return back()->with('error', 'Status transaksi tidak valid.');
        }

        $transaction->update(['status' => 'borrowed']);
        return back()->with('success', 'Peminjaman disetujui.');
    }

    // Admin mark as returned
    public function markAsReturned(Transaction $transaction)
    {
        if ($transaction->status !== 'borrowed') {
            return back()->with('error', 'Buku belum dipinjam atau sudah dikembalikan.');
        }

        $transaction->update([
            'status' => 'returned',
            'actual_return_date' => now()
        ]);

        // Restore stock
        $transaction->book->increment('stock');

        return back()->with('success', 'Buku berhasil dikembalikan.');
    }

    // User borrow request
    public function borrow(Request $request, Book $book)
    {
        if ($book->stock <= 0) {
            return back()->with('error', 'Stok buku habis.');
        }

        // Check if user has active transaction
        $hasActive = Transaction::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->whereIn('status', ['pending', 'borrowed'])
            ->exists();

        if ($hasActive) {
            return back()->with('error', 'Anda masih meminjam atau menunggu persetujuan untuk buku ini.');
        }

        // Create transaction
        Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrow_date' => now(),
            'return_date' => now()->addDays(7),
            'status' => 'pending'

        ]);

        // Reduce stock
        $book->decrement('stock');

        return redirect()->route('user.transactions')->with('success', 'Permintaan peminjaman berhasil dikirim. Menunggu persetujuan Admin.');
    }

    // User my transactions
    public function myTransactions()
    {
        $transactions = Transaction::with('book')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.transactions.index', compact('transactions'));
    }
}
