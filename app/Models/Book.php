<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\ReadingHistory;
use App\Models\Rating;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_buku',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
        'file_pdf',
        'cover',
        'deskripsi',
        'jumlah_dibaca',
        'category_id',
    ];

    public static function generateKodeBuku()
    {
        $latestBook = self::latest()->first();
        $nextNumber = $latestBook ? intval(substr($latestBook->kode_buku, -4)) + 1 : 1;
        return 'BK-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function readingHistories()
    {
        return $this->hasMany(ReadingHistory::class);
    }

    public function isFavoritedBy($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }

    public function incrementReadCount()
    {
        $this->increment('jumlah_dibaca');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getAverageRatingAttribute()
    {
        return round($this->ratings()->avg('rating'), 1) ?: 0;
    }

    public function userRating($userId)
    {
        return $this->ratings()->where('user_id', $userId)->value('rating');
    }

    public function getCoverUrlAttribute()
    {
        return $this->cover ? asset('storage/covers/' . $this->cover) : asset('images/default-book-cover.jpg');
    }

    public function getPdfUrlAttribute()
    {
        return $this->file_pdf ? asset('storage/books/' . $this->file_pdf) : null;
    }
}
