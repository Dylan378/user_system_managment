<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'dashboard'])->name('home');

Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('user/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('user', [UsersController::class, 'store'])->name('users.store');
    Route::get('user/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('user/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('user/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('user/{user}', [UsersController::class, 'show'])->name('users.show');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
