<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ReadingHistory;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    public function index()
    {
        $readingHistories = auth()->user()->readingHistories()
            ->with('book.category')
            ->latest()
            ->paginate(20);

        return view('student.reading-history.index', compact('readingHistories'));
    }
}
