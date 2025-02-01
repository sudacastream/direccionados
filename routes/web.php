<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuffetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailAvisoNuevoPrecioController;
use App\Http\Controllers\InletController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\SendTickets;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\TiendaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome-nueva');
});
Route::get('/vieja', function () {
    return view('welcome');
});

/*Route::get('/recursos', [RecursosController::class, 'index'])->name('recursos');
Route::post('/recursos', [RecursosController::class, 'verified'])->name('recursos.verified');*/

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
            Route::get('/admin/tokens', [AdminController::class, 'edit'])->name('admin.tokens');
            Route::post('/admin/search/token', [AdminController::class, 'search'])->name('admin.search');
            Route::put('/admin/search/token', [AdminController::class, 'ticket'])->name('admin.token.ticket');
            Route::patch('/admin/search/token', [AdminController::class, 'paid'])->name('admin.paid');    

            Route::get('/admin/tickets', [TicketsController::class, 'edit'])->name('admin.tickets');
            Route::post('/admin/search/ticket', [TicketsController::class, 'search'])->name('admin.ticket.search');
            Route::put('/admin/search/ticket', [TicketsController::class, 'token'])->name('admin.ticket.token');
            Route::get('/admin/shirts', [TicketsController::class, 'shirts'])->name('admin.shirts');

            Route::get('/admin/settings', [SettingsController::class, 'edit'])->name('admin.settings');

            Route::get('/admin', [AdminController::class, 'redirect'])->name('admin.redirect');
            Route::get('/admin/search', [AdminController::class, 'redirect'])->name('admin.search.redirect');
            Route::get('/admin/search/token', [AdminController::class, 'redirect'])->name('admin.search.token.redirect');
            Route::get('/admin/search/ticket', [AdminController::class, 'redirect'])->name('admin.search.ticket.redirect');

            Route::get('/admin/stats', [StatsController::class, 'index'])->name('admin.stats');

});


Route::get('/admin/list', [AdminController::class, 'list'])->middleware(['auth', 'verified'])->name('listado');
Route::get('/admin/list/pastors', [AdminController::class, 'pastors'])->middleware(['auth', 'verified'])->name('pastores');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/advice', [EmailAvisoNuevoPrecioController::class, 'index'])->name('advice');
    Route::post('/admin/advice', [EmailAvisoNuevoPrecioController::class, 'send'])->name('advice.send');
    Route::delete('/admin/advice', [EmailAvisoNuevoPrecioController::class, 'destroy'])->name('advice.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/ticket/send', [SendTickets::class, 'index'])->name('send');
    Route::post('/admin/ticket/send', [SendTickets::class, 'send'])->name('send.ticket');
    Route::get('/admin/ticket/send/{token}', [SendTickets::class, 'sendTicket'])->name('send.ticket.uno');
    Route::get('/admin/ticket/{token}', [SendTickets::class, 'getTicket'])->name('get.ticket.uno');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/inlet', [InletController::class, 'index'])->name('inlet');
    Route::post('/inlet', [InletController::class, 'search'])->name('inlet.search');
    Route::patch('/inlet', [InletController::class, 'asistencia'])->name('inlet.asistencia');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/buffet', [BuffetController::class, 'index'])->name('buffet');
    Route::post('/buffet', [BuffetController::class, 'search'])->name('buffet.search');
    Route::post('/buffet/usuario', [BuffetController::class, 'searchUsuario'])->name('buffet.search.usuario');
    Route::patch('/buffet', [BuffetController::class, 'entrega'])->name('buffet.entrega');
});


require __DIR__.'/auth.php';
