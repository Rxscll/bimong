<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['book', 'book.category'])
            ->where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'dipinjam'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('student.borrowings.index', compact('borrowings'));
    }

    public function history()
    {
        $borrowings = Borrowing::with(['book', 'book.category'])
            ->where('user_id', auth()->id())
            ->where('status', 'selesai')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('student.borrowings.history', compact('borrowings'));
    }

    public function show($id)
    {
        $borrowing = Borrowing::with(['book', 'book.category'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('student.borrowings.show', compact('borrowing'));
    }
}