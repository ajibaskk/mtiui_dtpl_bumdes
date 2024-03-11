<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NasabahController;
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
