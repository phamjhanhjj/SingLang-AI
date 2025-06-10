<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [UserController::class, 'showLoginFrom'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/dashboard', function() {
    return view('dashboard');
});
//->middleware('auth')->name('dashboard');
Route::get('/dashboard/tables', [\App\Http\Controllers\DashboardController::class, 'getTables'])->name('dashboard.tables');
Route::get('/dashboard/data/{type}', [\App\Http\Controllers\DashboardController::class, 'getData'])->name('dashboard.data');
