<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ReadingHistoryController;
use App\Http\Controllers\Student\BookController as StudentBookController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\FavoriteController;
use App\Http\Controllers\Student\ReadingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('student.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);

    Route::resource('books', AdminBookController::class);
    
    Route::resource('students', StudentController::class);

    Route::get('/reading-history', [ReadingHistoryController::class, 'index'])->name('reading-history.index');
});

// Public Student Routes (Guest Allowed Access)
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/books', [StudentBookController::class, 'index'])->name('books.index');
    Route::get('/books/{id}', [StudentBookController::class, 'show'])->name('books.show');
});

// Protected Student Routes (Requires Login)
Route::middleware(['auth', 'siswa'])->prefix('student')->name('student.')->group(function () {
    Route::get('/books/read/{id}', [StudentBookController::class, 'read'])->name('books.read');
    Route::post('/books/read/{id}/update-page', [StudentBookController::class, 'updatePage'])->name('books.update-page');
    Route::post('/books/{id}/rate', [StudentBookController::class, 'rate'])->name('books.rate');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{bookId}/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

    Route::get('/reading-history', [ReadingController::class, 'index'])->name('reading-history.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';