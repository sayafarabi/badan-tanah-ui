<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\AsetAdminController;
use App\Http\Controllers\Admin\BeritaAdminController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\KarierController;
use App\Http\Controllers\Admin\KarierAdminController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Admin\KontakAdminController;
use App\Http\Controllers\Admin\WebsiteBuilderController;
use App\Http\Controllers\Admin\WebsiteHalamanController;
use App\Http\Controllers\Admin\MenuNavigasiController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\AsetSubMenuController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// ================= FRONTEND (PUBLIK) =================

// Halaman Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Tentang
Route::get('/tentang', [HalamanController::class, 'index'])->name('about');

// Halaman Aset Persediaan Tanah (List, Filter, dan Detail)
Route::get('/aset', [AsetController::class, 'index'])->name('assets');
Route::get('/aset/filter', [AsetController::class, 'filter'])->name('assets.filter');
Route::get('/aset/{id}', [AsetController::class, 'show'])->name('assets.show');

// Halaman Pemanfaatan & Kerjasama
Route::get('/pemanfaatan', [HalamanController::class, 'partnership'])->name('partnership');

// Halaman Publikasi (List dan Detail)
Route::get('/publikasi', [BeritaController::class, 'index'])->name('publications');
Route::get('/publikasi/{id}', [BeritaController::class, 'show'])->name('publications.show');

// Halaman Pencarian
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Halaman Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

// Halaman FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Halaman Karier
Route::get('/karier', [KarierController::class, 'index'])->name('karier');

// ================= ADMIN (HANYA BISA DIAKSES JIKA LOGIN) =================

// Halaman Admin Dashboard
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

// Halaman Admin Website Builder (GET & POST)
Route::get('/admin/website', [WebsiteBuilderController::class, 'edit'])->name('admin.website');
Route::post('/admin/website', [WebsiteBuilderController::class, 'update'])->name('admin.website.update');

// Halaman Admin Aset (CRUD Lengkap)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/aset', [AsetAdminController::class, 'index'])->name('aset.index');
    Route::get('/aset/create', [AsetAdminController::class, 'create'])->name('aset.create');
    Route::post('/aset', [AsetAdminController::class, 'store'])->name('aset.store');
    Route::get('/aset/{id}/edit', [AsetAdminController::class, 'edit'])->name('aset.edit');
    Route::put('/aset/{id}', [AsetAdminController::class, 'update'])->name('aset.update');
    Route::delete('/aset/{id}', [AsetAdminController::class, 'destroy'])->name('aset.destroy');
});

// Halaman Admin Sub-Menu Aset Persediaan Tanah (TANPA DOBEL)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/aset/peta', [AsetSubMenuController::class, 'peta'])->name('aset.peta');
    Route::get('/aset/profil', [AsetSubMenuController::class, 'profil'])->name('aset.profil');
    Route::get('/aset/pengelolaan', [AsetSubMenuController::class, 'pengelolaan'])->name('aset.pengelolaan');
    Route::get('/aset/pengembangan', [AsetSubMenuController::class, 'pengembangan'])->name('aset.pengembangan');
    Route::get('/aset/wilayah', [AsetSubMenuController::class, 'wilayah'])->name('aset.wilayah');
    Route::get('/aset/status', [AsetSubMenuController::class, 'status'])->name('aset.status');
    Route::get('/aset/dokumen', [AsetSubMenuController::class, 'dokumen'])->name('aset.dokumen');
    Route::get('/aset/statistik', [AsetSubMenuController::class, 'statistik'])->name('aset.statistik');
});

// Halaman Admin Berita (CRUD Lengkap)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/berita', [BeritaAdminController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaAdminController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaAdminController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaAdminController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaAdminController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaAdminController::class, 'destroy'])->name('berita.destroy');
});

// Halaman Admin Edit Halaman Tentang
Route::get('/admin/halaman/tentang', [HalamanController::class, 'editTentang'])->name('admin.halaman.edit.tentang')->middleware('auth');
Route::post('/admin/halaman/tentang', [HalamanController::class, 'updateTentang'])->name('admin.halaman.update.tentang')->middleware('auth');

// Halaman Admin Edit Halaman Pemanfaatan
Route::get('/admin/halaman/pemanfaatan', [HalamanController::class, 'editPartnership'])->name('admin.halaman.edit.partnership')->middleware('auth');
Route::post('/admin/halaman/pemanfaatan', [HalamanController::class, 'updatePartnership'])->name('admin.halaman.update.partnership')->middleware('auth');

// Halaman Admin User (CRUD Lengkap)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/user', [UserAdminController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserAdminController::class, 'create'])->name('user.create');
    Route::post('/user', [UserAdminController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserAdminController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserAdminController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserAdminController::class, 'destroy'])->name('user.destroy');

    // Update role cepat dari halaman list
    Route::put('/user/{id}/role', [UserAdminController::class, 'quickUpdateRole'])->name('user.quickUpdateRole');
});

// Halaman Admin FAQ
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/faq', [FaqAdminController::class, 'index'])->name('faq.index');
    Route::get('/faq/create', [FaqAdminController::class, 'create'])->name('faq.create');
    Route::post('/faq', [FaqAdminController::class, 'store'])->name('faq.store');
    Route::get('/faq/{id}/edit', [FaqAdminController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/{id}', [FaqAdminController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{id}', [FaqAdminController::class, 'destroy'])->name('faq.destroy');
});

// Halaman Admin Karier
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/karier', [KarierAdminController::class, 'index'])->name('karier.index');
    Route::get('/karier/create', [KarierAdminController::class, 'create'])->name('karier.create');
    Route::post('/karier', [KarierAdminController::class, 'store'])->name('karier.store');
    Route::get('/karier/{id}/edit', [KarierAdminController::class, 'edit'])->name('karier.edit');
    Route::put('/karier/{id}', [KarierAdminController::class, 'update'])->name('karier.update');
    Route::delete('/karier/{id}', [KarierAdminController::class, 'destroy'])->name('karier.destroy');
});

// Halaman Admin Kontak
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/kontak', [KontakAdminController::class, 'index'])->name('kontak.index');
    Route::get('/kontak/{id}', [KontakAdminController::class, 'show'])->name('kontak.show');
    Route::delete('/kontak/{id}', [KontakAdminController::class, 'destroy'])->name('kontak.destroy');
});

// Halaman Admin Website Halaman Statis
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/halaman', [WebsiteHalamanController::class, 'index'])->name('halaman.index');
    Route::get('/halaman/create', [WebsiteHalamanController::class, 'create'])->name('halaman.create');
    Route::post('/halaman', [WebsiteHalamanController::class, 'store'])->name('halaman.store');
    Route::get('/halaman/{id}/edit', [WebsiteHalamanController::class, 'edit'])->name('halaman.edit');
    Route::put('/halaman/{id}', [WebsiteHalamanController::class, 'update'])->name('halaman.update');
    Route::delete('/halaman/{id}', [WebsiteHalamanController::class, 'destroy'])->name('halaman.destroy');
});

// Halaman Admin Menu Navigasi
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/menu-navigasi', [MenuNavigasiController::class, 'index'])->name('menu_navigasi');
    Route::post('/menu-navigasi', [MenuNavigasiController::class, 'update'])->name('menu_navigasi.update');
});

// Halaman Admin Footer
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/footer', [FooterController::class, 'index'])->name('footer.index');
    Route::post('/footer', [FooterController::class, 'update'])->name('footer.update');
});

// ================= AUTH BAWAAN BREEZE (JANGAN DIHAPUS) =================

// Halaman Dashboard Bawaan (untuk pengguna yang sudah login)
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// LOGOUT (Route ini harus ada dan tidak diproteksi)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';