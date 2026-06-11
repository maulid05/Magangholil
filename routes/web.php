<?php

use App\Http\Controllers\{ProfileController, DashboardController, UserController, 
        NavController, RoleController, MasterZakatController, 
        JenisZakatController, PermisionController, RolePermisionController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/user', UserController::class);
    Route::resource('/nav', NavController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/zakat', MasterZakatController::class);
    Route::resource('/jeniszakat', JenisZakatController::class);
    Route::resource('/permision', PermisionController::class);
    Route::resource('/role-permision', RolePermisionController::class);
});

require __DIR__.'/auth.php';
