<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::resource('books', BookController::class)->names([
    'index' => 'bookIndex',
    'create' => 'addBook',      // Matching the view's expectation
    'store' => 'book.store',
    'show' => 'book.show',
    'edit' => 'book.edit',
    'update' => 'book.update',
    'destroy' => 'destroyBook', // Matching the view's expectation
]);

// For the search route mentioned in header
Route::get('/search', [BookController::class, 'search'])->name('books');

// Locale switching route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en', 'fr'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
