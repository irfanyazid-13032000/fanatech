<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\InventoryController;
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


Route::middleware('admin')->group(function(){


  Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
  Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
  Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory.store');
  Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
  Route::get('/inventory/{id}/delete', [InventoryController::class, 'destroy'])->name('inventory.delete');
  Route::post('/inventory/{id}/update', [InventoryController::class, 'update'])->name('inventory.update');

});



Route::middleware('AdminSales')->group(function(){

Route::get('/sales', [SaleController::class, 'index'])->name('sale.index');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sale.create');
Route::post('/sales/store', [SaleController::class, 'store'])->name('sale.store');
Route::get('/sales/{id}/delete', [SaleController::class, 'destroy'])->name('sale.delete');
Route::get('/sales/{id}/detail', [SaleController::class, 'show'])->name('sale.detail');
Route::get('/sales/table-awal/{i}', [SaleController::class, 'tableAwal'])->name('sale.table.awal');
Route::get('/sales/table-tambahan/{i}', [SaleController::class, 'tableTambahan'])->name('sale.table.tambahan');

});



Route::middleware('AdminPurchase')->group(function(){


Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
Route::post('/purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');
Route::get('/purchase/{id}/detail', [PurchaseController::class, 'show'])->name('purchase.detail');
Route::get('/purchase/{id}/delete', [PurchaseController::class, 'destroy'])->name('purchase.delete');
Route::get('/purchase/table-awal/{i}', [PurchaseController::class, 'tableAwal'])->name('purchase.table.awal');
Route::get('/purchase/table-tambahan/{i}', [PurchaseController::class, 'tableTambahan'])->name('purchase.table.tambahan');

});



// datatable
Route::get('/data-sale/{id}', [DatatableController::class, 'dataSale'])->name('data-sale');
Route::get('/data-purchase/{id}', [DatatableController::class, 'dataPurchase'])->name('data-purchase');
Route::get('/data-inventory', [DatatableController::class, 'dataInventory'])->name('data-inventory');






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
