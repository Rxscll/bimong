<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalStudents = User::where('role', 'siswa')->count();
        $booksBorrowed = Borrowing::where('status', 'dipinjam')->count();
        $lateReturns = Borrowing::where('status', 'dipinjam')
            ->where('tanggal_kembali_rencana', '<', now())
            ->count();

        $pendingBorrowings = Borrowing::where('status', 'pending')->count();

        return view('admin.dashboard.index', compact('totalBooks', 'totalStudents', 'booksBorrowed', 'lateReturns', 'pendingBorrowings'));
    }
}
