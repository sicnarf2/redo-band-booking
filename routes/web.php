<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

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

Route::get('/', [SiteController::class, 'home']);

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::post('/bands', [BandController::class, 'store'])->name('bands.store');
Route::put('/bands/{id}', [BandController::class, 'update'])->name('bands.update');
Route::delete('/bands/{id}', [BandController::class, 'destroy'])->name('bands.destroy');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
