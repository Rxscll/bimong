<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Favorite;
use App\Models\ReadingHistory;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        
        $totalBooks = Book::count();
        $totalFavorites = $userId ? Favorite::where('user_id', $userId)->count() : 0;
        $totalReadBooks = $userId ? ReadingHistory::where('user_id', $userId)->distinct('book_id')->count() : 0;
        $recentBooks = Book::latest()->take(5)->get();
        $popularBooks = Book::orderBy('jumlah_dibaca', 'desc')->take(3)->get();
        $recentReadings = $userId ? ReadingHistory::with('book')->where('user_id', $userId)->latest()->take(5)->get() : collect();

        return view('student.dashboard.index', compact(
            'totalBooks',
            'totalFavorites', 
            'totalReadBooks',
            'recentBooks',
            'popularBooks',
            'recentReadings'
        ));
    }
}
