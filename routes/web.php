<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Welcome route (homepage)
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});
// Dashboard route (protected by auth middleware)
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (only accessible to authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes for users and roles, protected by auth middleware
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
});

// Authentication routes (these come from the Breeze package)
require __DIR__ . '/auth.php';




// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\UserController;
// use Illuminate\Support\Facades\Route;

// // Authentication routes provided by Breeze
// require __DIR__ . '/auth.php';

// Route::get('/', function () {
//     return view('backend.dashboard');
// });

// // Add authentication middleware for resource routes
// Route::middleware(['auth'])->group(function () {
//     Route::resource('role', RoleController::class);
//     Route::resource('user', UserController::class);
// });
