<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');

//--Pegawai Route--:
Route::get('/pegawai', [PegawaiController::class, 'pegawai'])->middleware('auth');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->middleware('auth');
Route::post('/pegawai', [PegawaiController::class, 'store'])->middleware('auth');
Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->middleware('auth');
Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->middleware('auth');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->middleware('auth');
//--Arsip Route--:
Route::get('/arsip', [DokumenController::class, 'arsip'])->middleware('auth');
Route::get('/arsip/create', [DokumenController::class, 'create'])->middleware('auth');
Route::post('/arsip', [DokumenController::class, 'store'])->middleware('auth');
Route::get('/arsip/{id}/edit', [DokumenController::class, 'edit'])->middleware('auth');
Route::put('/arsip/{id}', [DokumenController::class, 'update'])->middleware('auth');
Route::delete('/arsip/{id}', [DokumenController::class, 'destroy'])->middleware('auth');

//--Preview dokumen--:
Route::get('/dokumen/{id}', [DokumenController::class, 'dokumen'])->middleware('auth');


//--Login--:
Route::get('/', [LoginController::class, 'page'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);
