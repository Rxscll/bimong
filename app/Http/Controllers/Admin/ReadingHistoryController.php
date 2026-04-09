<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReadingHistory;
use Illuminate\Http\Request;

class ReadingHistoryController extends Controller
{
    public function index()
    {
        $readingHistories = ReadingHistory::with(['user', 'book'])
            ->latest()
            ->paginate(20);

        return view('admin.reading-history.index', compact('readingHistories'));
    }
}
