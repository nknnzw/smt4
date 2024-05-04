<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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



//login
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'authenticate'])->name('auth.authenticate');

//register
Route::get('/register', [AuthController::class,'register'])->name('auth.register');
Route::post('/register', [AuthController::class,'store'])->name('auth.store');

//logout
Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('index');
    Route::get('/tambah-mahasiswa', [MahasiswaController::class, 'create'])->name('create');
    Route::get('/edit-mahasiswa/{id}', [MahasiswaController::class, 'edit'])->name('edit');
 Route::post('/tambah-mahasiswa', [MahasiswaController::class, 'store'])->name('store');
 Route::post('/edit-mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('update');
 Route::post('/delete-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('destroy');

 Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


});