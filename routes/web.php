<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PinjamanController;
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
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login.post', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('home', [DashboardController::class, 'index'])->name('home')->middleware('auth');
Route::get('nasabah', [NasabahController::class, 'index'])->name('nasabah.index');
Route::get('nasabah/create', [NasabahController::class, 'create'])->name('nasabah.create');
Route::post('nasabah', [NasabahController::class, 'store'])->name('nasabah.store');
Route::get('nasabah/{nasabah}/edit', [NasabahController::class, 'edit'])->name('nasabah.edit');
Route::put('nasabah/{nasabah}/update', [NasabahController::class, 'update'])->name('nasabah.update');
Route::delete('nasabah/{nasabah}/destroy', [NasabahController::class, 'destroy'])->name('nasabah.destroy');
Route::get('nasabah/{nasabah}', [NasabahController::class, 'show'])->name('nasabah.detail');

Route::get('pinjaman', [PinjamanController::class, 'index'])->name('pinjaman.index');
Route::post('pinjaman', [PinjamanController::class, 'store'])->name('pinjaman.store');
Route::put('pinjaman', [PinjamanController::class, 'update'])->name('pinjaman.update');
Route::delete('pinjaman/{pinjaman}/destroy', [PinjamanController::class, 'destroy'])->name('pinjaman.destroy');
