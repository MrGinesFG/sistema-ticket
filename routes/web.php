<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    
    Route::resource('tickets', TicketController::class)
        ->except(['destroy']);
    Route::patch(
        '/tickets/{ticket}/cerrar',
        [TicketController::class, 'cerrar']
    )->name('tickets.cerrar');
});

require __DIR__ . '/settings.php';
