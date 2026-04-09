<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\BorrowingController as AdminBorrowingController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\BookController as StudentBookController;
use App\Http\Controllers\Student\BorrowingController as StudentBorrowingController;
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

    Route::resource('books', BookController::class);

    Route::resource('students', StudentController::class);

    Route::get('/borrowings', [AdminBorrowingController::class, 'index'])->name('borrowings.index');
    Route::post('/borrowings/{id}/approve', [AdminBorrowingController::class, 'approve'])->name('borrowings.approve');
    Route::post('/borrowings/{id}/return', [AdminBorrowingController::class, 'return'])->name('borrowings.return');
    Route::get('/borrowings/{id}', [AdminBorrowingController::class, 'show'])->name('borrowings.show');
});

Route::middleware(['auth', 'siswa'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');

    Route::get('/books', [StudentBookController::class, 'index'])->name('books.index');
    Route::get('/books/{id}', [StudentBookController::class, 'show'])->name('books.show');
    Route::post('/books/{id}/borrow', [StudentBookController::class, 'borrow'])->name('books.borrow');

    Route::get('/my-borrowings', [StudentBorrowingController::class, 'index'])->name('borrowings.index');
    Route::get('/my-borrowings/history', [StudentBorrowingController::class, 'history'])->name('borrowings.history');
    Route::get('/my-borrowings/{id}', [StudentBorrowingController::class, 'show'])->name('borrowings.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';