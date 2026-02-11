<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\TagihanController;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('show.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/tagihan/admin', [TagihanController::class, 'index'])->name('admin.tagihan.index');
    Route::post('/tagihan/store', [TagihanController::class, 'store'])->name('admin.tagihan.store');
    Route::get('/tagihan/{nama_tagihan}', [TagihanController::class, 'show'])->name('admin.tagihan.show');
    Route::post('/tagihan/selesai/{id}', [TagihanController::class, 'selesai'])->name('admin.tagihan.selesai');
    Route::delete('/tagihan/delete/{id}', [TagihanController::class, 'destroy'])->name('admin.tagihan.delete');

    Route::get('/saldo/admin', [SaldoController::class, 'index'])->name('admin.saldo.index');
    Route::post('/saldo/add', [SaldoController::class, 'store'])->name('admin.saldo.store');
    Route::delete('/saldo/{id}', [SaldoController::class, 'destroy'])->name('admin.saldo.destroy');

    Route::get('/users', [AuthController::class, 'create'])->name('users');
    Route::post('/adduser', [AuthController::class, 'adduser'])->name('adduser');
    Route::delete('/user/delete/{id}', [AuthController::class, 'destroy'])->name('deleteuser');
});

Route::middleware(['auth', 'role:kelas'])->group(function () {
    Route::get('/dashboard', [KelasController::class, 'dashboard'])->name('kelas.dashboard');
    // Route::get('/tagihan/{id}', [KelasController::class, 'showTagihan'])->name('kelas.tagihan.show');
    // Route::get('/stats', [KelasController::class, 'getStats'])->name('kelas.stats');
    // Route::get('/activities', [KelasController::class, 'getRecentActivities'])->name('kelas.activities');
    // Route::get('/pending', [KelasController::class, 'getPendingTagihan'])->name('kelas.pending');
    // Route::get('/completed', [KelasController::class, 'getCompletedTagihan'])->name('kelas.completed');
    // Route::get('/profile', [KelasController::class, 'profile'])->name('kelas.profile');
    // Route::put('/profile', [KelasController::class, 'updateProfile'])->name('kelas.profile.update');
    // Route::get('/export-pdf', [KelasController::class, 'exportTagihanPdf'])->name('kelas.export-pdf');
});

Route::middleware(['auth', 'role:admin,kelas'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

