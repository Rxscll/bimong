<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'deskripsi' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'file_pdf' => 'required|file|mimes:pdf|max:10240', // max 10MB
            'cover' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // max 2MB
        ]);

        $data = $request->except(['file_pdf', 'cover']);
        $data['kode_buku'] = Book::generateKodeBuku();

        // Handle PDF upload
        if ($request->hasFile('file_pdf')) {
            $pdfFile = $request->file('file_pdf');
            $pdfPath = $pdfFile->store('books', 'public');
            $data['file_pdf'] = basename($pdfPath);
        }

        // Handle cover upload
        if ($request->hasFile('cover')) {
            $coverFile = $request->file('cover');
            $coverPath = $coverFile->store('covers', 'public');
            $data['cover'] = basename($coverPath);
        }

        Book::create($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'deskripsi' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'file_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'cover' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->except(['file_pdf', 'cover']);

        // Handle PDF upload
        if ($request->hasFile('file_pdf')) {
            // Delete old PDF
            if ($book->file_pdf) {
                Storage::disk('public')->delete('books/' . $book->file_pdf);
            }
            
            $pdfFile = $request->file('file_pdf');
            $pdfPath = $pdfFile->store('books', 'public');
            $data['file_pdf'] = basename($pdfPath);
        }

        // Handle cover upload
        if ($request->hasFile('cover')) {
            // Delete old cover
            if ($book->cover) {
                Storage::disk('public')->delete('covers/' . $book->cover);
            }
            
            $coverFile = $request->file('cover');
            $coverPath = $coverFile->store('covers', 'public');
            $data['cover'] = basename($coverPath);
        }

        $book->update($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        // Delete files
        if ($book->file_pdf) {
            Storage::disk('public')->delete('books/' . $book->file_pdf);
        }
        if ($book->cover) {
            Storage::disk('public')->delete('covers/' . $book->cover);
        }

        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}
