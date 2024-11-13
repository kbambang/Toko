<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

Route::resource('transaksis', TransaksiController::class);
Route::post('/transaksis', [TransaksiController::class, 'store'])->name('transaksis.store');
Route::get('/laporan-pendapatan', [TransaksiController::class, 'laporanPendapatan'])->name('laporan.pendapatan')->middleware('userAkses:admin');
Route::get('/laporan-pendapatan/export', [TransaksiController::class, 'exportPDF'])->name('laporan.exportPDF');
Route::get('transaksi/cetak-struk/{id}', [TransaksiController::class, 'cetakStruk'])->name('transaksis.cetakStruk');


Route::resource('kasir', KasirController::class);
Route::get('/kasir/create', [KasirController::class, 'create'])->name('kasir.create')->middleware('userAkses:admin');

Route::resource('pembayaran', PembayaranController::class)->middleware('userAkses:admin');

Route::resource('barang', BarangController::class);
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create')->middleware('userAkses:admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// untuk login
Route::middleware(['guest'])->group(function (){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function() {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/kasir', [AdminController::class, 'kasir'])->middleware('userAkses:kasir');
    Route::get('/admin/owner', [AdminController::class, 'owner'])->middleware('userAkses:owner');
});

Route::get('/logout', [SesiController::class, 'logout']);