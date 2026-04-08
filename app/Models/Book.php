<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Borrowing;

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

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
