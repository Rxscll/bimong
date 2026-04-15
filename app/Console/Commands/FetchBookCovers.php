<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Book;

class FetchBookCovers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:fetch-covers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch empty book covers from Google Books API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $books = Book::whereNull('cover')->orWhere('cover', '')->get();

        if ($books->isEmpty()) {
            $this->info('No books with empty covers found.');
            return;
        }

        $this->info('Found ' . $books->count() . ' books without covers.');

        foreach ($books as $book) {
            $this->info('Fetching cover for: ' . $book->judul);
            
            $query = 'intitle:' . urlencode($book->judul);
            if ($book->penulis && strtolower($book->penulis) != 'tidak diketahui') {
                $query .= '+inauthor:' . urlencode($book->penulis);
            }

            $url = "https://www.googleapis.com/books/v1/volumes?q={$query}&maxResults=1";
            
            try {
                $response = Http::get($url);
                if ($response->successful()) {
                    $item = $response->json('items.0');
                    // Google API image links are inside volumeInfo.imageLinks
                    $imageUrl = $item['volumeInfo']['imageLinks']['thumbnail'] ?? null;
                    if (!$imageUrl) {
                        $imageUrl = $item['volumeInfo']['imageLinks']['smallThumbnail'] ?? null;
                    }

                    if ($imageUrl) {
                        // Change http to https if needed
                        $imageUrl = str_replace('http://', 'https://', $imageUrl);
                        
                        // Download the image
                        $imageContent = @file_get_contents($imageUrl);
                        if ($imageContent) {
                            $filename = 'cover_' . Str::slug($book->judul) . '_' . time() . '.jpg';
                            // In Book.php it checks storage/covers/, so we store in public/covers
                            Storage::disk('public')->put('covers/' . $filename, $imageContent);
                            
                            $book->cover = $filename;
                            $book->save();
                            
                            $this->info("✓ Cover updated successfully for {$book->judul}");
                        } else {
                            $this->error("✗ Failed to download image for {$book->judul}");
                        }
                    } else {
                        // fallback to just normal query if intitle is too strict
                        $queryBackup = urlencode($book->judul . ' ' . $book->penulis);
                        $urlBackup = "https://www.googleapis.com/books/v1/volumes?q={$queryBackup}&maxResults=1";
                        $responseBackup = Http::get($urlBackup);
                        
                        $imageUrl = null;
                        if ($responseBackup->successful()) {
                            $item = $responseBackup->json('items.0');
                            $imageUrl = $item['volumeInfo']['imageLinks']['thumbnail'] ?? null;
                        }

                        if ($imageUrl) {
                            $imageUrl = str_replace('http://', 'https://', $imageUrl);
                            $imageContent = @file_get_contents($imageUrl);
                            if ($imageContent) {
                                $filename = 'cover_' . Str::slug($book->judul) . '_' . time() . '.jpg';
                                Storage::disk('public')->put('covers/' . $filename, $imageContent);
                                
                                $book->cover = $filename;
                                $book->save();
                                $this->info("✓ Cover updated successfully (using fallback query) for {$book->judul}");
                            }
                        } else {
                            $this->warn("! No cover image found in API response for {$book->judul}");
                        }
                    }
                } else {
                    $this->error("✗ API request failed for {$book->judul} - Status: " . $response->status() . " - " . $response->body());
                }
            } catch (\Exception $e) {
                $this->error("Exception for {$book->judul}: " . $e->getMessage());
            }
            // Sleep slightly to prevent rate limiting
            usleep(2000000); // 2s
        }

        $this->info('Finished fetching covers.');
    }
}
