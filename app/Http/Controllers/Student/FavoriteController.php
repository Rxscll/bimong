<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Book;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = auth()->user()->favorites()
            ->with('book.category')
            ->latest()
            ->paginate(12);

        return view('student.favorites.index', compact('favorites'));
    }

    public function toggle($bookId)
    {
        $userId = auth()->id();
        $book = Book::findOrFail($bookId);

        $favorite = Favorite::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->first();

        if ($favorite) {
            // Remove from favorites
            $favorite->delete();
            return redirect()->back()->with('success', 'Buku dihapus dari favorit.');
        } else {
            // Add to favorites
            Favorite::create([
                'user_id' => $userId,
                'book_id' => $bookId,
            ]);
            return redirect()->back()->with('success', 'Buku ditambahkan ke favorit.');
        }
    }
}
