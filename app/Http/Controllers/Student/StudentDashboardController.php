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
        
        $totalBooks = Book::whereNotNull('file_pdf')->count();
        $totalFavorites = Favorite::where('user_id', $userId)->count();
        $totalReadBooks = ReadingHistory::where('user_id', $userId)->distinct('book_id')->count();
        $recentBooks = Book::whereNotNull('file_pdf')->latest()->take(5)->get();
        $popularBooks = Book::whereNotNull('file_pdf')->orderBy('jumlah_dibaca', 'desc')->take(3)->get();
        $recentReadings = ReadingHistory::with('book')->where('user_id', $userId)->latest()->take(5)->get();

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
