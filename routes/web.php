<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SkkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\FillPDFController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LampiranController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\PersonaliaController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\DownloadAPLController;
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

Route::get('/', [DashboardController::class,'index'])->middleware('auth');


// skk
Route::get('/skk', [SkkController::class, 'index'])->name('skk.index')->middleware('admin');
Route::get('/status-skk/{id}', [SkkController::class, 'status'])->name('skk.status')->middleware('admin');

// pelatihan
Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index')->middleware('admin');
Route::get('/status-pelatihan/{id}', [PelatihanController::class, 'status'])->name('pelatihan.status')->middleware('admin');

// pendidikan
Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index')->middleware('admin');
Route::get('/status-pendidikan/{id}', [PendidikanController::class, 'status'])->name('pendidikan.status')->middleware('admin');

// personalia
Route::get('/personalia', [PersonaliaController::class, 'index'])->name('personalia.index')->middleware('admin');
Route::get('/status-personalia/{id}', [PersonaliaController::class, 'status'])->name('personalia.status')->middleware('admin');

// pengalaman
Route::get('/pengalaman', [PengalamanController::class, 'index'])->name('pengalaman.index')->middleware('admin');
Route::get('/status-pengalaman/{id}', [PengalamanController::class, 'status'])->name('pengalaman.status')->middleware('admin');

// datatable TKK
Route::get('/data-skk', [DatatableController::class, 'dataSKK'])->name('data-skk');
Route::get('/data-pelatihan', [DatatableController::class, 'dataPelatihan'])->name('data-pelatihan');
Route::get('/data-pendidikan', [DatatableController::class, 'dataPendidikan'])->name('data-pendidikan');
Route::get('/data-personalia', [DatatableController::class, 'dataPersonalia'])->name('data-personalia');
Route::get('/data-pengalaman', [DatatableController::class, 'dataPengalaman'])->name('data-pengalaman');


// asesor
Route::get('/asesor', [AsesorController::class, 'index'])->name('asesor.index')->middleware('admin');
Route::get('/asesor/tambah', [AsesorController::class, 'create'])->name('asesor.tambah')->middleware('admin');
Route::post('/asesor/simpan', [AsesorController::class, 'store'])->name('asesor.simpan')->middleware('admin');
Route::get('/asesor/anggota/{no_surat}', [AsesorController::class, 'anggota'])->name('anggota.asesor')->middleware('admin');
Route::post('/asesor/anggota/{no_surat}', [AsesorController::class, 'tambahAnggota'])->name('anggota.tambah')->middleware('admin');
Route::get('/asesor/export/{no_surat}', [AsesorController::class, 'exportSurat'])->name('export.surat')->middleware('admin');
Route::get('/asesor/hapus/anggota/{id}/{no_surat}', [AsesorController::class, 'hapusAnggota'])->name('anggota.hapus')->middleware('admin');



// datatable asesor
Route::get('/data-asesor', [DatatableController::class, 'dataAsesor'])->name('data-asesor');



// undangan
Route::get('/undangan', [UndanganController::class, 'index'])->name('undangan.index')->middleware('admin');
Route::get('/undangan/delete/{id}', [UndanganController::class, 'destroy'])->name('undangan.destroy')->middleware('admin');
Route::get('/undangan/export/{id}', [UndanganController::class, 'export'])->name('undangan.export')->middleware('admin');


// datatable undangan
Route::get('/data-undangan', [DatatableController::class, 'dataUndangan'])->name('data-undangan');



// berita acara
Route::get('/berita-acara', [BeritaAcaraController::class, 'index'])->name('berita.index')->middleware('admin');
Route::get('/berita-acara/destroy/{no_surat}', [BeritaAcaraController::class, 'destroy'])->name('berita.destroy')->middleware('admin');
Route::get('/berita-acara/export/{no_surat}', [BeritaAcaraController::class, 'export'])->name('berita.export')->middleware('admin');
Route::get('/berita-acara/peserta/{no_surat}', [BeritaAcaraController::class, 'peserta'])->name('berita.peserta')->middleware('admin');
Route::get('/berita-acara/hapus/peserta/{id}/{no_surat}', [BeritaAcaraController::class, 'hapusPeserta'])->name('peserta.hapus')->middleware('admin');
Route::post('/berita-acara/tambah/peserta/{no_surat}', [BeritaAcaraController::class, 'tambahPeserta'])->name('peserta.tambah')->middleware('admin');

// datatable berita acara
Route::get('/data-berita-acara', [DatatableController::class, 'dataBeritaAcara'])->name('data-berita-acara');



// lampiran
Route::get('/lampiran', [LampiranController::class, 'index'])->name('lampiran.index')->middleware('admin');
Route::get('/lampiran/peserta/{no_surat}', [LampiranController::class, 'peserta'])->name('lampiran.peserta')->middleware('admin');
Route::post('/lampiran/tambah/peserta/{no_surat}', [LampiranController::class, 'pesertaTambah'])->name('lampiran.peserta.tambah')->middleware('admin');
Route::get('/lampiran/peserta/hapus/{no_surat}/{id}', [LampiranController::class, 'pesertaHapus'])->name('lampiran.peserta.hapus')->middleware('admin');
Route::get('/lampiran/export/{no_surat}', [LampiranController::class, 'export'])->name('lampiran.export')->middleware('admin');

// datatable lampiran
Route::get('/data-lampiran', [DatatableController::class, 'dataLampiran'])->name('data-lampiran');





// payment
Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index')->middleware('admin');
Route::get('/confirm-payment', [InvoiceController::class, 'confirmPayment'])->name('confirm.index')->middleware('admin');


// datatable payment
Route::get('/data-invoice', [DatatableController::class, 'dataInvoice'])->name('data-invoice');
Route::get('/data-confirm', [DatatableController::class, 'dataConfirm'])->name('data-confirm');


// 
Route::get('/download/{file}', [DownloadAPLController::class, 'download'])->name('download.file')->middleware('admin');

 


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
