<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\MasterBungaController;
use App\Http\Controllers\MasterTenorController;
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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login.post', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('/', [DashboardController::class, 'index'])->name('home')->middleware('auth');
Route::get('nasabah', [NasabahController::class, 'index'])->name('nasabah.index');
Route::get('nasabah/create', [NasabahController::class, 'create'])->name('nasabah.create');
Route::post('nasabah', [NasabahController::class, 'store'])->name('nasabah.store');
Route::get('nasabah/{nasabah}/edit', [NasabahController::class, 'edit'])->name('nasabah.edit');
Route::put('nasabah/{nasabah}/update', [NasabahController::class, 'update'])->name('nasabah.update');
Route::delete('nasabah/destroy', [NasabahController::class, 'destroy'])->name('nasabah.destroy');
Route::get('nasabah/{nasabah}', [NasabahController::class, 'show'])->name('nasabah.detail');

Route::get('pinjaman', [PinjamanController::class, 'index'])->name('pinjaman.index');
Route::post('pinjaman', [PinjamanController::class, 'store'])->name('pinjaman.store');
Route::put('pinjaman', [PinjamanController::class, 'update'])->name('pinjaman.update');
Route::delete('pinjaman/{pinjaman}/destroy', [PinjamanController::class, 'destroy'])->name('pinjaman.destroy');

Route::get('nasabah/{nasabah}/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('nasabah/{nasabah}/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('nasabah/{nasabah}/peminjaman/{peminjaman}', [PeminjamanController::class, 'detail'])->name('peminjaman.detail');
Route::get('nasabah/{nasabah}/peminjaman/{peminjaman}/pdf', [PeminjamanController::class, 'generatepdf'])->name('peminjaman.generate-pdf');
Route::get('nasabah/{nasabah}/peminjaman/{peminjaman}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');

Route::get('master/bunga', [MasterBungaController::class, 'index'])->name('master.bunga');
Route::post('master/bunga', [MasterBungaController::class, 'store'])->name('master.bunga.store');
Route::put('master/bunga', [MasterBungaController::class, 'update'])->name('master.bunga.update');
Route::delete('master/bunga/{masterBunga}/destroy', [MasterBungaController::class, 'destroy'])->name('master.bunga.destroy');

Route::get('master/tenor', [MasterTenorController::class, 'index'])->name('master.tenor');
Route::post('master/tenor', [MasterTenorController::class, 'store'])->name('master.tenor.store');
Route::put('master/tenor', [MasterTenorController::class, 'update'])->name('master.tenor.update');
Route::delete('master/tenor/{masterBunga}/destroy', [MasterTenorController::class, 'destroy'])->name('master.tenor.destroy');

Route::get('angsuran', [AngsuranController::class, 'index'])->name('angsuran.index');
Route::get('angsuran/{peminjaman}', [AngsuranController::class, 'show'])->name('angsuran.detail');
Route::put('angsuran/{peminjaman}/update', [AngsuranController::class, 'update'])->name('angsuran.update');



