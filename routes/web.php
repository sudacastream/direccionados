<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TiendaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/tienda', [TiendaController::class, 'edit'])->name('tienda');
    Route::post('/tienda', [TiendaController::class, 'store'])->name('tienda.store');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/tokens', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/admin', [AdminController::class, 'redirect'])->name('admin.redirect');
    Route::get('/admin/search', [AdminController::class, 'redirect'])->name('admin.search.redirect');

    Route::post('/admin/search/token', [AdminController::class, 'search'])->name('admin.search');
    Route::patch('/admin/search/token', [AdminController::class, 'paid'])->name('admin.paid');
    Route::get('/admin/search/token', [AdminController::class, 'redirect'])->name('admin.search.token.redirect');
    

    Route::get('/admin/settings', [SettingsController::class, 'edit'])->name('admin.settings.edit');
});



require __DIR__.'/auth.php';
