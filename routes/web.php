<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SkkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FillPDFController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\PersonaliaController;
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
    return view('dashboard.index');
})->middleware('auth');



Route::get('/skk', [SkkController::class, 'index'])->name('skk.index')->middleware('admin');
Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index')->middleware('admin');
Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index')->middleware('admin');
Route::get('/personalia', [PersonaliaController::class, 'index'])->name('personalia.index')->middleware('admin');
Route::get('/pengalaman', [PengalamanController::class, 'index'])->name('pengalaman.index')->middleware('admin');



// Route::get('/assessment', [PengalamanController::class, 'index'])->name('assessment.index')->middleware('admin');
// Route::get('/assessor', [PengalamanController::class, 'index'])->name('assessor.index')->middleware('admin');
// Route::get('/tkk', [PengalamanController::class, 'index'])->name('tkk.index')->middleware('admin');

Route::get('/data-skk', [DatatableController::class, 'dataSKK'])->name('data-skk');
Route::get('/data-pelatihan', [DatatableController::class, 'dataPelatihan'])->name('data-pelatihan');
Route::get('/data-pendidikan', [DatatableController::class, 'dataPendidikan'])->name('data-pendidikan');
Route::get('/data-personalia', [DatatableController::class, 'dataPersonalia'])->name('data-personalia');
Route::get('/data-pengalaman', [DatatableController::class, 'dataPengalaman'])->name('data-pengalaman');



Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('admin');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('admin');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('register-post')->middleware('guest');
