<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $totalBorrowed = Borrowing::where('user_id', $userId)->count();
        $activeBorrowings = Borrowing::where('user_id', $userId)
            ->where('status', 'dipinjam')
            ->count();
        $pendingBorrowings = Borrowing::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();
        $completedBorrowings = Borrowing::where('user_id', $userId)
            ->where('status', 'selesai')
            ->count();

        return view('student.dashboard.index', compact(
            'totalBorrowed',
            'activeBorrowings',
            'pendingBorrowings',
            'completedBorrowings'
        ));
    }
}