<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StatisticController;
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


Route::middleware('auth', 'hasApartments')->group(function () {

    // ROTTE APPARTAMENTO
    Route::resource('apartments', ApartmentController::class)->parameters(['apartments' => 'apartment:slug']);

    // ROTTE PROFILO
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ROTTE MESSAGGI
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::DELETE('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // ROTTE SPONSORIZZAZIONI
    Route::get('/sponsor', [SponsorController::class, 'create'])->name('sponsor.create');
    Route::get('/sponsor/list', [SponsorController::class, 'index'])->name('sponsor.index');
    Route::post('/sponsor', [SponsorController::class, 'store'])->name('sponsor.store');

    // ROTTE STATISTICHE
    Route::get('/statistics', [StatisticController::class, 'index'])->name('statistics.index');
    Route::get('/apartments/{apartment}/statistics', [StatisticController::class, 'show'])->name('statistics.show');
});


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // sovrascrivo le rotte che devono essere accessibili senza apartamenti
    Route::get('/apartments/create', [ApartmentController::class, 'create'])->name('apartments.create');
    Route::post('/apartments', [ApartmentController::class, 'store'])->name('apartments.store');
});

require __DIR__ . '/auth.php';
