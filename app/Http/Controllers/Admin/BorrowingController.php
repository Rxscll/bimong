<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['user', 'book'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.borrowings.index', compact('borrowings'));
    }

    public function approve($id)
    {
        $borrowing = Borrowing::findOrFail($id);

        if ($borrowing->status !== 'pending') {
            return redirect()->back()->with('error', 'Hanya peminjaman dengan status menunggu yang bisa disetujui.');
        }

        $book = $borrowing->book;
        if ($book->stok < 1) {
            return redirect()->back()->with('error', 'Stok buku habis.');
        }

        $borrowing->update(['status' => 'dipinjam']);
        $book->decrement('stok');

        return redirect()->route('admin.borrowings.index')
            ->with('success', 'Peminjaman berhasil disetujui.');
    }

    public function return($id)
    {
        $borrowing = Borrowing::findOrFail($id);

        if ($borrowing->status !== 'dipinjam') {
            return redirect()->back()->with('error', 'Hanya buku yang sedang dipinjam yang bisa dikembalikan.');
        }

        $book = $borrowing->book;
        $borrowing->tanggal_kembali_real = now()->toDateString();
        $denda = $borrowing->calculateFine();

        $borrowing->update([
            'status' => 'selesai',
            'tanggal_kembali_real' => $borrowing->tanggal_kembali_real,
            'denda' => $denda,
        ]);

        $book->increment('stok');

        $message = 'Buku berhasil dikembalikan.';
        if ($denda > 0) {
            $message .= " Denda: Rp " . number_format($denda, 0, ',', '.');
        }

        return redirect()->route('admin.borrowings.index')
            ->with('success', $message);
    }

    public function show($id)
    {
        $borrowing = Borrowing::with(['user', 'book'])->findOrFail($id);
        return view('admin.borrowings.show', compact('borrowing'));
    }
}