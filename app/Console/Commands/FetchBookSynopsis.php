<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Book;

class FetchBookSynopsis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:fetch-synopsis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch book synopsis from Google Books API and update empty ones';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all books, or books where deskripsi is empty
        $books = Book::whereNull('deskripsi')->orWhere('deskripsi', '')->orWhere('deskripsi', '-')->get();

        if ($books->isEmpty()) {
            $this->info('No books with empty synopsis found. Processing all books instead to ensure they are updated.');
            $books = Book::all();
        }

        $this->info('Found ' . $books->count() . ' books to process.');

        foreach ($books as $book) {
            $this->info('Fetching synopsis for: ' . $book->judul);
            
            $query = 'intitle:' . urlencode($book->judul);
            if ($book->penulis && strtolower($book->penulis) != 'tidak diketahui') {
                $query .= '+inauthor:' . urlencode($book->penulis);
            }

            $url = "https://www.googleapis.com/books/v1/volumes?q={$query}&maxResults=1";
            
            try {
                $response = Http::get($url);
                if ($response->successful()) {
                    $item = $response->json('items.0');
                    $description = $item['volumeInfo']['description'] ?? null;
                    
                    if ($description) {
                        $book->deskripsi = strip_tags($description); // Simple clean up
                        $book->save();
                        $this->info("✓ Synopsis updated successfully for {$book->judul}");
                    } else {
                        // Fallback broader search
                        $queryBackup = urlencode($book->judul . ' ' . $book->penulis);
                        $urlBackup = "https://www.googleapis.com/books/v1/volumes?q={$queryBackup}&maxResults=1";
                        $responseBackup = Http::get($urlBackup);
                        
                        $descriptionFallback = null;
                        if ($responseBackup->successful()) {
                            $itemBackup = $responseBackup->json('items.0');
                            $descriptionFallback = $itemBackup['volumeInfo']['description'] ?? null;
                        }

                        if ($descriptionFallback) {
                            $book->deskripsi = strip_tags($descriptionFallback);
                            $book->save();
                            $this->info("✓ Synopsis updated (fallback) for {$book->judul}");
                        } else {
                            $this->warn("! No synopsis found in API response for {$book->judul}");
                        }
                    }
                } else {
                    $this->error("✗ API request failed for {$book->judul} - Status: " . $response->status());
                }
            } catch (\Exception $e) {
                $this->error("Exception for {$book->judul}: " . $e->getMessage());
            }
            // Sleep slightly to prevent rate limiting
            usleep(2000000); // 2s
        }

        $this->info('Finished fetching synopses.');
    }
}
