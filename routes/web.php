<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dev', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//declare resources for default methods
Route::resource('people',\App\Http\Controllers\PersonController::class);

//redirect to homepage after logging in
Route::get('/dashboard', [\App\Http\Controllers\PersonController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
