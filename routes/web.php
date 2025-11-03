<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SiteController,
    AuthController,
    CekKoneksiController
};
use App\Http\Controllers\Admin\{
    DataUserController,
    RoleUserController,
    JenisHewanController,
    RasHewanController,
    PemilikController,
    PetController,
    KategoriController,
    KategoriKlinisController,
    KodeTindakanTerapiController,
    RekamMedisController
};
use App\Http\Controllers\Dokter\RekamMedisController as DokterRekamMedisController;
use App\Http\Controllers\Perawat\RekamMedisController as PerawatRekamMedisController;
use App\Http\Controllers\Pemilik\{
    HomeController as PemilikHomeController,
    DaftarPetController as PemilikDaftarPetController,
    ReservasiController as PemilikReservasiController,
    RekamMedisController as PemilikRekamMedisController
};
use App\Http\Controllers\Resepsionis\{
    HomeController as ResepsionisHomeController,
    TemuDokterController as ResepsionisTemuDokterController,
    PemilikController as ResepsionisPemilikController,
    PetController as ResepsionisPetController
};

// =====================================================
// 🔹 HALAMAN PUBLIK
// =====================================================
Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'home')->name('site.home');
    Route::get('/struktur', 'struktur')->name('site.struktur');
    Route::get('/layanan', 'layanan')->name('site.layanan');
    Route::get('/lokasi', 'lokasi')->name('site.lokasi');
    Route::get('/visi', 'visi')->name('site.visi');
    Route::get('/jadwal', 'jadwal')->name('site.jadwal');
});

// =====================================================
// 🔹 AUTHENTICATION (LOGIN, REGISTER, LOGOUT)
// =====================================================
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::get('/logout', 'logout')->name('logout');
});

// =====================================================
// 🔹 DASHBOARD PER ROLE
// =====================================================
Route::prefix('dashboard')->group(function () {
    Route::middleware(['auth', 'isAdmin'])->get('/admin', fn() => view('dashboard.admin.index'))->name('dashboard.admin');
    Route::middleware(['auth', 'isDokter'])->get('/dokter', fn() => view('dashboard.dokter.index'))->name('dashboard.dokter');
    Route::middleware(['auth', 'isPerawat'])->get('/perawat', fn() => view('dashboard.perawat.index'))->name('dashboard.perawat');
    Route::middleware(['auth', 'isResepsionis'])->get('/resepsionis', fn() => view('dashboard.resepsionis.index'))->name('dashboard.resepsionis');
    Route::middleware(['auth', 'isPemilik'])->get('/pemilik', fn() => view('dashboard.pemilik.index'))->name('dashboard.pemilik');

    // Halaman data master admin
    Route::middleware(['auth', 'isAdmin'])
        ->get('/admin/data', fn() => view('dashboard.admin.data_master'))
        ->name('dashboard.admin.data');
});

// =====================================================
// 🔹 ADMIN AREA
// =====================================================
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {

    /** 👤 Data User */
    Route::resource('data-user', DataUserController::class);
    Route::post('data-user/{id}/reset', [DataUserController::class, 'reset'])->name('data-user.reset');

    /** ⚙️ Role User */
    Route::prefix('role-user')->name('role-user.')->group(function () {
        Route::get('/', [RoleUserController::class, 'index'])->name('index');
        Route::post('/', [RoleUserController::class, 'store'])->name('store');
        Route::get('/set-active/{iduser}/{idrole}', [RoleUserController::class, 'setActive'])->name('setActive');
        Route::post('/set-active-confirm', [RoleUserController::class, 'setActiveConfirm'])->name('setActiveConfirm');
        Route::get('/deactivate/{iduser}/{idrole}', [RoleUserController::class, 'deactivate'])->name('deactivate');
        Route::post('/deactivate-confirm', [RoleUserController::class, 'deactivateConfirm'])->name('deactivateConfirm');
        Route::post('/destroy-confirm', [RoleUserController::class, 'destroyConfirm'])->name('destroyConfirm');
    });

    /** 📂 Data Master */
    Route::resources([
        'jenis-hewan' => JenisHewanController::class,
        'ras-hewan' => RasHewanController::class,
        'pemilik' => PemilikController::class,
        'pet' => PetController::class,
        'kategori' => KategoriController::class,
        'kategori-klinis' => KategoriKlinisController::class,
        'kode-tindakan-terapi' => KodeTindakanTerapiController::class,
        'rekam-medis' => RekamMedisController::class,
    ]);
});

// =====================================================
// 🔹 DOKTER AREA (UPDATED CRUD PENUH)
// =====================================================
Route::prefix('dokter')->middleware(['auth', 'isDokter'])->name('dokter.')->group(function () {
    Route::get('/rekam-medis', [DokterRekamMedisController::class, 'index'])->name('rekam-medis.index');
    Route::get('/rekam-medis/create', [DokterRekamMedisController::class, 'create'])->name('rekam-medis.create');
    Route::post('/rekam-medis', [DokterRekamMedisController::class, 'store'])->name('rekam-medis.store');
    Route::get('/rekam-medis/{id}', [DokterRekamMedisController::class, 'show'])->name('rekam-medis.show');
    Route::get('/rekam-medis/{id}/edit', [DokterRekamMedisController::class, 'edit'])->name('rekam-medis.edit');
    Route::put('/rekam-medis/{id}', [DokterRekamMedisController::class, 'update'])->name('rekam-medis.update');
});

// =====================================================
// 🔹 PERAWAT AREA
// =====================================================
Route::prefix('perawat')->middleware(['auth', 'isPerawat'])->name('perawat.')->group(function () {
    Route::get('/rekam-medis', [PerawatRekamMedisController::class, 'index'])->name('rekam-medis.index');
    Route::get('/rekam-medis/create', [PerawatRekamMedisController::class, 'create'])->name('rekam-medis.create');
    Route::post('/rekam-medis', [PerawatRekamMedisController::class, 'store'])->name('rekam-medis.store');
    Route::get('/rekam-medis/{id}', [PerawatRekamMedisController::class, 'show'])->name('rekam-medis.show');
    Route::put('/rekam-medis/{id}', [PerawatRekamMedisController::class, 'update'])->name('rekam-medis.update');

    // tindakan tambahan
    Route::post('/rekam-medis/{id}/tindakan', [PerawatRekamMedisController::class, 'tambahTindakan'])->name('rekam-medis.tindakan.store');
    Route::put('/rekam-medis/tindakan/{iddetail}', [PerawatRekamMedisController::class, 'updateTindakan'])->name('rekam-medis.tindakan.update');
    Route::delete('/rekam-medis/tindakan/{iddetail}', [PerawatRekamMedisController::class, 'hapusTindakan'])->name('rekam-medis.tindakan.destroy');
});

// =====================================================
// 🔹 PEMILIK AREA (UPDATED CRUD PET, RESERVASI & REKAM MEDIS)
// =====================================================
Route::prefix('pemilik')->middleware(['auth', 'isPemilik'])->name('pemilik.')->group(function () {
    Route::get('/', [PemilikHomeController::class, 'index'])->name('home');

    // 🐾 Daftar Pet
    Route::get('/daftar-pet', [PemilikDaftarPetController::class, 'index'])->name('pet.index');
    Route::get('/daftar-pet/create', [PemilikDaftarPetController::class, 'create'])->name('pet.create');
    Route::post('/daftar-pet', [PemilikDaftarPetController::class, 'store'])->name('pet.store');
    Route::get('/daftar-pet/{id}/edit', [PemilikDaftarPetController::class, 'edit'])->name('pet.edit');
    Route::put('/daftar-pet/{id}', [PemilikDaftarPetController::class, 'update'])->name('pet.update');

    // 📅 Reservasi Dokter
    Route::get('/reservasi', [PemilikReservasiController::class, 'index'])->name('reservasi.index');
    Route::get('/reservasi/create', [PemilikReservasiController::class, 'create'])->name('reservasi.create');
    Route::post('/reservasi', [PemilikReservasiController::class, 'store'])->name('reservasi.store');

    // 📋 Rekam Medis Hewan
    Route::get('/rekam-medis', [PemilikRekamMedisController::class, 'index'])->name('rekam.index');
    Route::get('/rekam-medis/{id}', [PemilikRekamMedisController::class, 'show'])->name('rekam.show');
    Route::get('/rekam-medis/create', [PemilikRekamMedisController::class, 'create'])->name('rekam.create');
    Route::post('/rekam-medis', [PemilikRekamMedisController::class, 'store'])->name('rekam.store');
});

// =====================================================
// 🔹 RESEPSIONIS AREA
// =====================================================
Route::prefix('resepsionis')->middleware(['auth', 'isResepsionis'])->name('resepsionis.')->group(function () {
    Route::get('/', [ResepsionisHomeController::class, 'index'])->name('home');

    // Temu Dokter
    Route::get('/temu-dokter', [ResepsionisTemuDokterController::class, 'index'])->name('temu.index');
    Route::post('/temu-dokter', [ResepsionisTemuDokterController::class, 'store'])->name('temu.store');
    Route::put('/temu-dokter/{id}', [ResepsionisTemuDokterController::class, 'update'])->name('temu.update');
    Route::delete('/temu-dokter/{id}', [ResepsionisTemuDokterController::class, 'destroy'])->name('temu.destroy');

    // Registrasi Pemilik & Pet
    Route::get('/registrasi-pemilik', [ResepsionisPemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/registrasi-pemilik', [ResepsionisPemilikController::class, 'store'])->name('pemilik.store');
    Route::get('/registrasi-pet', [ResepsionisPetController::class, 'create'])->name('pet.create');
    Route::post('/registrasi-pet', [ResepsionisPetController::class, 'store'])->name('pet.store');
});

// =====================================================
// 🔹 CEK KONEKSI DATABASE
// =====================================================
Route::controller(CekKoneksiController::class)->group(function () {
    Route::get('/cek-koneksi', 'index')->name('cek.koneksi');
    Route::get('/cek-data', 'data')->name('cek.data');
});

// =====================================================
// 🔹 DEFAULT HOME (Fallback Laravel)
// =====================================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
