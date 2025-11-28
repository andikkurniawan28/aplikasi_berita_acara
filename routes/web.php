<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\MaterialController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware(['auth']);
Route::post('/home/process', [HomeController::class, 'process'])->name('home.process')->middleware(['auth']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login_process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('/kasuss', KasusController::class)->middleware(['auth']);
Route::resource('/jenis_kendaraan', JenisKendaraanController::class)->middleware(['auth']);
Route::resource('/material', MaterialController::class)->middleware(['auth']);
