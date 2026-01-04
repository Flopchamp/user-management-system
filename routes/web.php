<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/make-admin', function() {
    $user = auth()->user();
    if ($user) {
        $user->role = 'admin';
        $user->save();
        return 'You are now an admin! <a href="/dashboard">Go to dashboard</a>';
    }
    return 'Please login first! <a href="/login">Login</a>';
})->middleware('auth');

require __DIR__.'/auth.php';
