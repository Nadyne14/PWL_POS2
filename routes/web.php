<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\DataTables\KategoriDataTable;
use App\Http\Controllers\POSController;
use App\Http\Controllers\WelcomeController;



Route::get('/                                                                                              ', function () {
    $breadcrumb = (object)[
        'title' => 'Selamat Datang',
        'list' => ['Home', 'Welcome']
    ];

    $activeMenu = 'dashboard';

    return view('welcome', compact('breadcrumb', 'activeMenu'));
});


// Route User
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('user.store');
Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('user.ubah');
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('user.update');
Route::delete('/user/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');


// Route Level
Route::get('/level', [LevelController::class, 'index']);

// Route Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::resource('m_user', POSController::class);
// Route::get('/', [WelcomeController::class, 'index'])->name('home');