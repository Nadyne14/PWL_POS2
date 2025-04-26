
<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SupplierController;

// Route Level
Route::get('/level', [LevelController::class, 'index']);

Route::get('/', [WelcomeController::class, 'index'])->name('home');

// Route Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::get('/barang', [\App\Http\Controllers\BarangController::class, 'index'])->name('barang.index');

Route::get('/penjualan', [\App\Http\Controllers\PenjualanController::class, 'index'])->name('penjualan.index');

Route::get('/stokbarang', [\App\Http\Controllers\SupplierController::class, 'stokbarang'])->name('stokbarang.index');

Route::post('/user/list', [UserController::class, 'list'])->name('user.list');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::post('/supplier/list', [SupplierController::class, 'list'])->name('supplier.list');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::group(['prefix' => 'user'], function () {
    Route::get('/create_ajax', [UserController::class, 'create_ajax'])->name('user.create_ajax'); // Menampilkan halaman form tambah user Ajax
    Route::post('/store-ajax', [UserController::class, 'storeAjax'])->name('user.store_ajax'); // Menyimpan data user baru Ajax
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
});
