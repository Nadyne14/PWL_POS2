<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\DataTables\KategoriDataTable;
use App\Http\Controllers\POSController;
use App\Http\Controllers\WelcomeController;



Route::get('/', function () {
    $breadcrumb = (object)[
        'title' => 'Selamat Datang',
        'list' => ['Home', 'Welcome']
    ];

    $activeMenu = 'dashboard';

    return view('welcome', compact('breadcrumb', 'activeMenu'));
});


Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    // Commented out old routes for tambah and tambah_simpan to avoid conflicts
    // Route::get('/tambah', [UserController::class, 'tambah'])->name('user.tambah');
    // Route::post('/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('user.store');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/ubah/{id}', [UserController::class, 'ubah'])->name('user.ubah');
    Route::put('/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('user.update');
    Route::delete('/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

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

    // Route::get('/', [UserController::class, 'index']); // Display the main user page
    Route::post('/list', [UserController::class, 'list']); // Show user data as JSON for DataTables
    Route::get('/create', [UserController::class, 'create']); // Display the form to add a new user
    Route::post('/', [UserController::class, 'store']); // Save new user data
    Route::get('/{id}', [UserController::class, 'show']); // Show user details
    Route::get('/{id}/edit', [UserController::class, 'edit']); // Display the form to edit user data
    Route::put('/{id}', [UserController::class, 'update']); // Save updates to user data
    Route::delete('/{id}', [UserController::class, 'destroy']); // Delete user data—

