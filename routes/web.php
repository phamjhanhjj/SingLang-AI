<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
Use App\Http\Controllers\DynamicCrudController;

//login - logout
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [UserController::class, 'showLoginFrom'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//dashboard
Route::get('/dashboard', function() {
    return view('dashboard');
});
//->middleware('auth')->name('dashboard');
Route::get('/dashboard/tables', [\App\Http\Controllers\DashboardController::class, 'getTables'])->name('dashboard.tables');
Route::get('/dashboard/data/{type}', [\App\Http\Controllers\DashboardController::class, 'getData'])->name('dashboard.data');

//student
// Route::resource('student', StudentController::class);

//Dynamic CRUD
Route::prefix('crud/{table}')->group(function () {
    Route::get('/', [DynamicCrudController::class, 'index'])->name('dynamic_crud.index');
    Route::get('/create', [DynamicCrudController::class, 'create'])->name('dynamic_crud.create');
    Route::post('/', [DynamicCrudController::class, 'store'])->name('dynamic_crud.store');
    Route::get('/{id}/edit', [DynamicCrudController::class, 'edit'])->name('dynamic_crud.edit');
    Route::put('/{id}', [DynamicCrudController::class, 'update'])->name('dynamic_crud.update');
    Route::delete('/{id}', [DynamicCrudController::class, 'destroy'])->name('dynamic_crud.destroy');
});
