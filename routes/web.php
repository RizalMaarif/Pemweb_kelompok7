<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;




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
Route::get('index', [UserController::class,'index'])->name('user.index');
Route::post('tambah', [UserController::class,'tambah'])->name('user.tambah');
Route::post('store', [UserController::class, 'store'])->name('user.store');
Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('kategori', [DasboardController::class,'kategori'])->name('kategori.index');
Route::get('order', [DasboardController::class,'order'])->name('order.index');
Route::get('user', [DasboardController::class,'user'])->name('user.index');
Route::get('produk', [DasboardController::class,'produk'])->name('produk.index');
Route::resource('/', DasboardController::class);

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.tambah');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('index', [OrderController::class, 'index'])->name('order.index');
Route::get('tambah', [OrderController::class, 'tambah'])->name('order.tambah');
Route::post('store', [OrderController::class, 'store'])->name('order.store');
Route::get('edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
Route::put('update/{id}', [OrderController::class, 'update'])->name('order.update');
Route::delete('destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');