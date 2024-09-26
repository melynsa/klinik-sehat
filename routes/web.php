<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\TampilanController;
use Illuminate\Support\Facades\Route;


// Petugas dan admin //
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [KategoriController::class, 'tampilkategori'])->name('tampil.kategori');
    Route::post('/admin/store', [KategoriController::class, 'simpankategori'])->name('simpan.kategori');
    Route::put('/kategori/{id}/update', [KategoriController::class, 'updatekategori'])->name('update.kategori');
    Route::delete('/kategori/{id}/delete', [KategoriController::class, 'deletekategori'])->name('delete.kategori');
});
// Petugas dan admin //

// Petugas dan admin //
Route::middleware(['auth','petugas'])->group(function () {
    Route::get('/pemeriksaan/create/{kategori}', [PemeriksaanController::class, 'tambahperiksabyid'])->name('pemeriksaan.create.with.category');
    Route::get('/invoice/{id}', [PemeriksaanController::class, 'showInvoice'])->name('invoice');
    Route::get('/invoice/pdf/{id}', [PemeriksaanController::class, 'generatePdf'])->name('invoice.pdf');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/pemeriksaan', [PemeriksaanController::class, 'tampilkategori'])->name('pemeriksaan.index');
    Route::post('/pemeriksaan/store', [PemeriksaanController::class, 'simpanpemeriksaan'])->name('pemeriksaan.store');
    Route::post('/pemeriksaan/{id}/delete', [PemeriksaanController::class, 'hapuspemeriksaan'])->name('pemeriksaan.destroy');
});
// Petugas dan admin //

// Petugas dan admin //
Route::get('/', [TampilanController::class, 'tampillanding'])->name('landing.page');

// Petugas dan admin //
Route::middleware(['auth'])->group(function () {
    Route::get('/petugas', [TampilanController::class, 'tampillandingauth'])->name('landingauth.page');
    Route::get('/service', [TampilanController::class, 'tampilservice'])->name('service.page');
    Route::get('/about', [TampilanController::class, 'tampilabout'])->name('about.page');
    Route::get('/detailblog/{id}', [TampilanController::class, 'tampildetailblog'])->name('dblog.page');
    Route::get('/blog', [TampilanController::class, 'tampilblog'])->name('blog.page');
    Route::get('/contact', [TampilanController::class, 'tampilcontact'])->name('contact.page');
    Route::get('/doctor', [TampilanController::class, 'tampildokter'])->name('doctor.page');
    Route::get('/appoint', [TampilanController::class, 'tampilappoint'])->name('appoint.page');
});

// admin //
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/menublog', [BlogController::class, 'tampilblog'])->name('tampil.blog');
    Route::post('/menublog/store', [BlogController::class, 'simpanblog'])->name('simpan.blog');
    Route::put('/blog/{id}/update', [BlogController::class, 'updateblog'])->name('update.blog');
    Route::delete('/blog/{id}/delete', [BlogController::class, 'deleteblog'])->name('delete.blog');

    Route::get('/menudokter', [DokterController::class, 'tampildokter'])->name('tampil.dokter');
    Route::post('/menudokter/store', [DokterController::class, 'simpandokter'])->name('simpan.dokter');
    Route::put('/dokter/{id}/update', [DokterController::class, 'updatedokter'])->name('update.dokter');
    Route::delete('/dokter/{id}/delete', [DokterController::class, 'deletedokter'])->name('delete.dokter');
});
// admin //

//petugas dan admin//
Route::middleware(['auth', 'petugas'])->group(function () {
    Route::get('/pendaftaranpasien', [PendaftaranController::class, 'daftarpasien'])->name('pasien.daftar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'tampildaftar'])->name('tampil.daftar');
    Route::post('/pendaftaran/store', [PendaftaranController::class, 'simpandaftar'])->name('simpan.daftar');
    Route::put('/daftar/{id}/update', [PendaftaranController::class, 'updatedaftar'])->name('update.daftar');
    Route::delete('/daftar/{id}/delete', [PendaftaranController::class, 'deletedaftar'])->name('delete.daftar');
});

// Routes for login and registration
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




