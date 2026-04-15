<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\ReadingHistory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');

        $books = Book::with('category')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                        ->orWhere('penulis', 'like', "%{$search}%")
                        ->orWhere('kode_buku', 'like', "%{$search}%");
                });
            })
            ->when($category_id, function ($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->latest()
            ->paginate(12);

        $categories = Category::all();

        return view('student.books.index', compact('books', 'categories', 'search', 'category_id'));
    }

    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('student.books.show', compact('book'));
    }

    public function read($id)
    {
        $book = Book::findOrFail($id);
        
        if (!$book->file_pdf) {
            return redirect()->back()->with('error', 'File PDF tidak tersedia untuk buku ini.');
        }

        // Increment read count
        $book->incrementReadCount();

        // Save reading history
        ReadingHistory::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'book_id' => $book->id,
            ],
            [
                'last_page' => 1,
                'updated_at' => now(),
            ]
        );

        return view('student.books.read', compact('book'));
    }
}