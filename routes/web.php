<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\TagihanController;
use App\Models\Tagihan;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('show.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/tagihan/admin', [TagihanController::class, 'index'])->name('admin.tagihan.index');
    Route::post('/tagihan/add', [TagihanController::class, 'store'])->name('admin.tagihan.store');
    Route::get('/tagihan/{nama_tagihan}', [TagihanController::class, 'show'])->name('admin.tagihan.show');
    Route::post('/tagihan/selesai/{id}', [TagihanController::class, 'selesai'])->name('admin.tagihan.selesai');

    Route::get('/saldo/admin', [SaldoController::class, 'index'])->name('admin.saldo.index');
    Route::post('/saldo/add', [SaldoController::class, 'store'])->name('admin.saldo.store');
    Route::delete('/saldo/{id}', [SaldoController::class, 'destroy'])->name('admin.saldo.destroy');

    Route::get('/rekap/admin', [RekapController::class, 'index'])->name('admin.rekap.index');
    Route::get('/rekap/export-pdf', [RekapController::class, 'exportPdf'])->name('admin.rekap.export.pdf');
    Route::get('/rekap/export-excel', [RekapController::class, 'exportExcel'])->name('admin.rekap.export.excel');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/adduser', [AuthController::class, 'adduser'])->name('adduser');
});
