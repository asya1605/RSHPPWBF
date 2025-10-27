<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\RekamMedisController;
use App\Http\Controllers\CekKoneksiController;

// =====================================================
// 🔹 HALAMAN PUBLIK
// =====================================================
Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('site.struktur');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
Route::get('/lokasi', [SiteController::class, 'lokasi'])->name('site.lokasi');
Route::get('/visi', [SiteController::class, 'visi'])->name('site.visi');
Route::get('/jadwal', [SiteController::class, 'jadwal'])->name('site.jadwal');

// =====================================================
// 🔹 AUTHENTICATION (LOGIN, REGISTER, LOGOUT)
// =====================================================
Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// =====================================================
// 🔹 DASHBOARD (ROLE-BASED ACCESS)
// =====================================================
Route::prefix('dashboard')->middleware(['web'])->group(function () {
    Route::middleware(['role:administrator'])->get('/admin', fn() => view('dashboard.admin.index'))->name('dashboard.admin');
    Route::middleware(['role:dokter'])->get('/dokter', fn() => view('dashboard.dokter.index'))->name('dashboard.dokter');
    Route::middleware(['role:perawat'])->get('/perawat', fn() => view('dashboard.perawat.index'))->name('dashboard.perawat');
    Route::middleware(['role:resepsionis'])->get('/resepsionis', fn() => view('dashboard.resepsionis.index'))->name('dashboard.resepsionis');
    Route::middleware(['role:pemilik'])->get('/pemilik', fn() => view('dashboard.pemilik.index'))->name('dashboard.pemilik');

    // ✅ Halaman Data Master Admin
    Route::middleware(['role:administrator'])
        ->get('/admin/data', fn() => view('dashboard.admin.data_master'))
        ->name('dashboard.admin.data');
});

// =====================================================
// 🔹 ADMIN ROUTES (CRUD DATA MASTER)
// =====================================================
Route::prefix('admin')->middleware(['web', 'role:administrator'])->group(function () {

    // ✅ Data User
    Route::resource('data-user', DataUserController::class)->names('admin.data-user');
    Route::get('data-user/{id}/reset', [DataUserController::class, 'reset'])->name('admin.data-user.reset');

    // ✅ Role User (Tambahan manual supaya tidak error RouteNotFound)
    Route::prefix('role-user')->name('admin.role-user.')->group(function () {
        Route::get('/', [RoleUserController::class, 'index'])->name('index');
        Route::get('/create', [RoleUserController::class, 'create'])->name('create');
        Route::post('/', [RoleUserController::class, 'store'])->name('store');
        Route::get('/{role_user}/edit', [RoleUserController::class, 'edit'])->name('edit');
        Route::put('/{role_user}', [RoleUserController::class, 'update'])->name('update');
        Route::delete('/{role_user}', [RoleUserController::class, 'destroy'])->name('destroy');

        // 🟡 Tambahan manual (karena bukan default resource)
        Route::get('/set-active/{iduser}/{idrole}', [RoleUserController::class, 'setActive'])->name('setActive');
        Route::get('/deactivate/{iduser}/{idrole}', [RoleUserController::class, 'deactivate'])->name('deactivate');
        Route::post('/deactivate-confirm', [RoleUserController::class, 'deactivateConfirm'])->name('deactivateConfirm');
    });

    // ✅ Jenis Hewan
    Route::resource('jenis-hewan', JenisHewanController::class)->names('admin.jenis-hewan');

    // ✅ Ras Hewan
    Route::resource('ras-hewan', RasHewanController::class)->names('admin.ras-hewan');

    // ✅ Pemilik
    Route::resource('pemilik', PemilikController::class)->names('admin.pemilik');

    // ✅ Pet
    Route::resource('pet', PetController::class)->names('admin.pet');

    // ✅ Kategori
    Route::resource('kategori', KategoriController::class)->names('admin.kategori');

    // ✅ Kategori Klinis
    Route::resource('kategori-klinis', KategoriKlinisController::class)->names('admin.kategori-klinis');

    // ✅ Kode Tindakan Terapi
    Route::resource('kode-tindakan-terapi', KodeTindakanTerapiController::class)->names('admin.kode-tindakan-terapi');

    // ✅ Rekam Medis
    Route::resource('rekam-medis', RekamMedisController::class)->names('admin.rekam-medis');
});

// =====================================================
// 🔹 CEK KONEKSI DATABASE
// =====================================================
Route::get('/cek-koneksi', [CekKoneksiController::class, 'index'])->name('cek.koneksi');
Route::get('/cek-data', [CekKoneksiController::class, 'data'])->name('cek.data');

// =====================================================
// 🔹 DEFAULT LARAVEL ROUTE
// =====================================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
