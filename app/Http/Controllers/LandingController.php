<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class LandingController extends Controller
{
    public function index()
    {
        // Buku Unggulan: rata-rata rating >= 4.0, diurutkan dari rating tertinggi
        $featuredBooks = Book::withCount('ratings')
            ->withAvg('ratings', 'rating')
            ->having('ratings_avg_rating', '>=', 4.0)
            ->orderByDesc('ratings_avg_rating')
            ->orderByDesc('ratings_count')
            ->take(4)
            ->get();

        // Buku Populer: diurutkan berdasarkan jumlah_dibaca terbanyak
        $popularBooks = Book::orderByDesc('jumlah_dibaca')
            ->take(8)
            ->get();

        return view('landing.index', compact('featuredBooks', 'popularBooks'));
    }
}
