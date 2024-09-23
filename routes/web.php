<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemeriksaanController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/admin/create', [KategoriController::class, 'createkategori'])->name('buat.kategori');
// Route::get('/kategori/{id}/edit', [KategoriController::class, 'editkategori'])->name('edit.kategori');
// Route::post('/kategori/{id}/update', [KategoriController::class, 'updatekategori'])->name('update.kategori');

// route kategori
Route::get('/admin', [KategoriController::class, 'tampilkategori'])->name('tampil.kategori');
Route::post('/admin/store', [KategoriController::class, 'simpankategori'])->name('simpan.kategori');
Route::put('/kategori/{id}/update', [KategoriController::class, 'updatekategori'])->name('update.kategori');
Route::delete('/kategori/{id}/delete', [KategoriController::class, 'deletekategori'])->name('delete.kategori');


Route::get('/pemeriksaan', [PemeriksaanController::class, 'index'])->name('pemeriksaan.index');
Route::get('/pemeriksaan/create', [PemeriksaanController::class, 'create'])->name('pemeriksaan.create');
Route::post('/pemeriksaan', [PemeriksaanController::class, 'store'])->name('pemeriksaan.store');
Route::get('/pemeriksaan/{id}/edit', [PemeriksaanController::class, 'edit'])->name('pemeriksaan.edit');
Route::post('/pemeriksaan/{id}', [PemeriksaanController::class, 'update'])->name('pemeriksaan.update');
Route::post('/pemeriksaan/{id}/delete', [PemeriksaanController::class, 'destroy'])->name('pemeriksaan.destroy');

Route::get('/pemeriksaan/create/{kategori}', [PemeriksaanController::class, 'createWithCategory'])->name('pemeriksaan.create.with.category');

Route::get('/', [PemeriksaanController::class, 'tampillanding'])->name('landing.page');

Route::get('/invoice/{id}', [PemeriksaanController::class, 'showInvoice'])->name('invoice');
Route::get('/invoice/pdf/{id}', [PemeriksaanController::class, 'generatePdf'])->name('invoice.pdf');
