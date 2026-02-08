<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');

        $books = Book::with('category')
            ->where('stok', '>', 0)
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                        ->orWhere('penulis', 'like', "%{$search}%")
                        ->orWhere('kode_buku', 'like', "%{$search}%");
                });
            })
            ->when($category_id, function ($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->paginate(12);

        $categories = Category::all();

        return view('student.books.index', compact('books', 'categories', 'search', 'category_id'));
    }

    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('student.books.show', compact('book'));
    }

    public function borrow($id)
    {
        $book = Book::findOrFail($id);

        if ($book->stok < 1) {
            return redirect()->back()->with('error', 'Stok buku habis.');
        }

        $userId = auth()->id();

        $existingBorrowing = Borrowing::where('user_id', $userId)
            ->where('book_id', $id)
            ->whereIn('status', ['pending', 'dipinjam'])
            ->first();

        if ($existingBorrowing) {
            return redirect()->back()->with('error', 'Anda sudah meminjam atau sedang meminta peminjaman untuk buku ini.');
        }

        Borrowing::create([
            'user_id' => $userId,
            'book_id' => $id,
            'tanggal_pinjam' => now()->toDateString(),
            'tanggal_kembali_rencana' => now()->addDays(7)->toDateString(),
            'status' => 'pending',
            'denda' => 0,
        ]);

        return redirect()->route('student.books.index')
            ->with('success', 'Permintaan peminjaman buku berhasil dikirim. Silakan tunggu persetujuan admin.');
    }
}