<?php

use App\Http\Controllers\Auth\PasswordController;
// use App\Http\Controllers\Front\DocumentController;
// use App\Http\Controllers\Front\SopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
});

Route::resource('/dashboard', HomeController::class)->middleware(['auth'])->names('home');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
