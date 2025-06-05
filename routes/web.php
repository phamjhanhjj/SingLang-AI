<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [AuthController::class, 'showLoginFrom'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
