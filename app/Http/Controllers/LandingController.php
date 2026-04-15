<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class LandingController extends Controller
{
    public function index()
    {
        $popularBooks = Book::orderBy('jumlah_dibaca', 'desc')->take(4)->get();
        return view('landing.index', compact('popularBooks'));
    }
}
