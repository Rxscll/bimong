<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;
use Carbon\Carbon;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali_rencana',
        'tanggal_kembali_real',
        'status',
        'denda',
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali_rencana' => 'date',
        'tanggal_kembali_real' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function calculateFine()
    {
        if ($this->tanggal_kembali_real && $this->tanggal_kembali_real > $this->tanggal_kembali_rencana) {
            $real = Carbon::parse($this->tanggal_kembali_real);
            $rencana = Carbon::parse($this->tanggal_kembali_rencana);
            return $real->diffInDays($rencana) * 1000;
        }
        return 0;
    }
}
