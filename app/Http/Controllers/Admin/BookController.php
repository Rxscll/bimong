<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        $kodeBuku = Book::generateKodeBuku();
        
        return view('admin.books.create', compact('categories', 'kodeBuku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'stok' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Generate automatic book code
        $kodeBuku = Book::generateKodeBuku();

        $bookData = $request->all();
        $bookData['kode_buku'] = $kodeBuku;

        Book::create($bookData);

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan dengan kode: ' . $kodeBuku);
    }

    public function show(string $id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('admin.books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_buku' => 'required|string|unique:books,kode_buku,' . $id,
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'stok' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('admin.books.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}