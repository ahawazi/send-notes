<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')->name('profile');
    
    Route::resource('notes', NoteController::class);
});

require __DIR__.'/auth.php';
