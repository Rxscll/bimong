<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        $books = [
            ['judul' => 'The Great Gatsby', 'penulis' => 'F. Scott Fitzgerald', 'penerbit' => 'Scribner', 'tahun_terbit' => 1925],
            ['judul' => 'To Kill a Mockingbird', 'penulis' => 'Harper Lee', 'penerbit' => 'J.B. Lippincott & Co.', 'tahun_terbit' => 1960],
            ['judul' => '1984', 'penulis' => 'George Orwell', 'penerbit' => 'Secker & Warburg', 'tahun_terbit' => 1949],
            ['judul' => 'Pride and Prejudice', 'penulis' => 'Jane Austen', 'penerbit' => 'T. Egerton', 'tahun_terbit' => 1913],
            ['judul' => 'The Catcher in the Rye', 'penulis' => 'J.D. Salinger', 'penerbit' => 'Little, Brown and Company', 'tahun_terbit' => 1951],
            ['judul' => 'Lord of the Flies', 'penulis' => 'William Golding', 'penerbit' => 'Faber and Faber', 'tahun_terbit' => 1954],
            ['judul' => 'Harry Potter and the Sorcerer\'s Stone', 'penulis' => 'J.K. Rowling', 'penerbit' => 'Bloomsbury', 'tahun_terbit' => 1997],
            ['judul' => 'The Hunger Games', 'penulis' => 'Suzanne Collins', 'penerbit' => 'Scholastic Press', 'tahun_terbit' => 2008],
            ['judul' => 'The Da Vinci Code', 'penulis' => 'Dan Brown', 'penerbit' => 'Doubleday', 'tahun_terbit' => 2003],
            ['judul' => 'The Alchemist', 'penulis' => 'Paulo Coelho', 'penerbit' => 'HarperCollins', 'tahun_terbit' => 1988],
            ['judul' => 'Brief History of Time', 'penulis' => 'Stephen Hawking', 'penerbit' => 'Bantam Books', 'tahun_terbit' => 1988],
            ['judul' => 'The Origin of Species', 'penulis' => 'Charles Darwin', 'penerbit' => 'John Murray', 'tahun_terbit' => 1959],
            ['judul' => 'A Brief History of Nearly Everything', 'penulis' => 'Bill Bryson', 'penerbit' => 'Broadway Books', 'tahun_terbit' => 2003],
            ['judul' => 'Sapiens', 'penulis' => 'Yuval Noah Harari', 'penerbit' => 'Harper', 'tahun_terbit' => 2011],
            ['judul' => 'Thinking, Fast and Slow', 'penulis' => 'Daniel Kahneman', 'penerbit' => 'Farrar, Straus and Giroux', 'tahun_terbit' => 2011],
            ['judul' => 'The Lean Startup', 'penulis' => 'Eric Ries', 'penerbit' => 'Crown Business', 'tahun_terbit' => 2011],
            ['judul' => 'Zero to One', 'penulis' => 'Peter Thiel', 'penerbit' => 'Crown Business', 'tahun_terbit' => 2014],
            ['judul' => 'The Art of War', 'penulis' => 'Sun Tzu', 'penerbit' => 'Various', 'tahun_terbit' => 1910],
            ['judul' => 'Moby Dick', 'penulis' => 'Herman Melville', 'penerbit' => 'Harper & Brothers', 'tahun_terbit' => 1951],
            ['judul' => 'War and Peace', 'penulis' => 'Leo Tolstoy', 'penerbit' => 'The Russian Messenger', 'tahun_terbit' => 1969],
            ['judul' => 'The Odyssey', 'penulis' => 'Homer', 'penerbit' => 'Ancient Greek', 'tahun_terbit' => 1901],
            ['judul' => 'Don Quixote', 'penulis' => 'Miguel de Cervantes', 'penerbit' => 'Francisco de Robles', 'tahun_terbit' => 1905],
            ['judul' => 'The Divine Comedy', 'penulis' => 'Dante Alighieri', 'penerbit' => 'Various', 'tahun_terbit' => 1920],
            ['judul' => 'One Hundred Years of Solitude', 'penulis' => 'Gabriel García Márquez', 'penerbit' => 'Editorial Sudamericana', 'tahun_terbit' => 1967],
            ['judul' => 'The Hobbit', 'penulis' => 'J.R.R. Tolkien', 'penerbit' => 'George Allen & Unwin', 'tahun_terbit' => 1937],
            ['judul' => 'Fahrenheit 451', 'penulis' => 'Ray Bradbury', 'penerbit' => 'Ballantine Books', 'tahun_terbit' => 1953],
            ['judul' => 'Brave New World', 'penulis' => 'Aldous Huxley', 'penerbit' => 'Chatto & Windus', 'tahun_terbit' => 1932],
            ['judul' => 'The Hitchhiker\'s Guide to the Galaxy', 'penulis' => 'Douglas Adams', 'penerbit' => 'Pan Books', 'tahun_terbit' => 1979],
            ['judul' => 'Dune', 'penulis' => 'Frank Herbert', 'penerbit' => 'Chilton Books', 'tahun_terbit' => 1965],
            ['judul' => 'Foundation', 'penulis' => 'Isaac Asimov', 'penerbit' => 'Gnome Press', 'tahun_terbit' => 1951],
        ];

        $categories = Category::all();

        foreach ($books as $index => $bookData) {
            Book::updateOrCreate(
                ['kode_buku' => 'BK' . str_pad($index + 1, 4, '0', STR_PAD_LEFT)],
                [
                    'judul' => $bookData['judul'],
                    'penulis' => $bookData['penulis'],
                    'penerbit' => $bookData['penerbit'],
                    'tahun_terbit' => $bookData['tahun_terbit'],
                    'stok' => rand(2, 5),
                    'category_id' => $categories->count() > 0 ? $categories->random()->id : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}