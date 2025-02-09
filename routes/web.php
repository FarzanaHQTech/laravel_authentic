<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.dashboard');
});


Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
