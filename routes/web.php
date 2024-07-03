<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PesanController;

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');

Route::get('/', [BarangController::class, 'home'])->name('barangCountByCategory');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->role == 'kepala_sekolah') {
        return redirect()->route('kepsek.dashboard');
    } elseif (auth()->user()->role == 'user'){
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Dashboard per role

// Route untuk Admin
Route::middleware(['auth', 'admin'])->prefix('dashboard/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/', [ChartController::class, 'index'])->name('admin.dashboard');
    Route::get('/tabel-barang', [AdminController::class, 'tabelBarang'])->name('admin.tabel-barang');
    Route::get('/tabel-barang', [BarangController::class, 'dashboard'])->name('admin.tabel-barang');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

    Route::get('/tabel-user', [AdminController::class, 'tabelUser'])->name('admin.tabel-user');
    Route::get('/tabel-user', [AccountController::class, 'viewUsers'])->name('admin.tabel-user');
    Route::get('/admin/users/{id}/edit', [AccountController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [AccountController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [AccountController::class, 'destroy'])->name('users.destroy');

    Route::get('/tabel-supplier', [AdminController::class, 'tabelSupplier'])->name('admin.tabel-supplier');
    Route::get('/tabel-supplier', [SupplierController::class, 'index'])->name('admin.tabel-supplier');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    Route::get('/tabel-pesan', [AdminController::class, 'tabelPesan'])->name('admin.tabel-pesan');
    Route::get('/tabel-pesan', [AdminController::class, 'viewPesan'])->name('admin.tabel-pesan');
    Route::delete('/tabel-pesan/{id}', [AdminController::class, 'destroyPesan'])->name('pesan.destroy');

});

// Route untuk Kepala Sekolah
Route::middleware(['auth', 'kepsek'])->prefix('dashboard/kepsek')->group(function () {
    Route::get('/', [KepsekController::class, 'index'])->name('kepsek.dashboard');
    Route::get('/', [PesanController::class, 'messageKepsek'])->name('kepsek.dashboard');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy');
    Route::get('/barang/download-pdf', [BarangController::class, 'downloadPDF'])->name('barang.downloadPDF');
});

// Route untuk User Biasa
Route::middleware(['auth', 'user'])->prefix('dashboard/user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/', [PesanController::class, 'messageUser'])->name('user.dashboard');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy');
});

require __DIR__.'/auth.php';
