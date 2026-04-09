<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\ReadingHistory;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalUsers = User::where('role', 'siswa')->count();
        $popularBooks = Book::orderBy('jumlah_dibaca', 'desc')->take(5)->get();
        $recentBooks = Book::latest()->take(5)->get();
        $totalReadingSessions = ReadingHistory::count();

        return view('admin.dashboard.index', compact(
            'totalBooks',
            'totalUsers', 
            'popularBooks',
            'recentBooks',
            'totalReadingSessions'
        ));
    }
}
