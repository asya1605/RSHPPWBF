<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SiteController,
    AuthController,
    CekKoneksiController
};
use App\Http\Controllers\Admin\{
    HomeController as AdminHomeController,
    DataUserController,
    RoleUserController,
    JenisHewanController,
    RasHewanController,
    PemilikController,
    PetController,
    KategoriController,
    KategoriKlinisController,
    KodeTindakanTerapiController,
    RekamMedisController,
    RelasiController
};
use App\Http\Controllers\Dokter\{
    RekamMedisController as DokterRekamMedisController,
    PasienController as DokterPasienController,
    ProfilController as DokterProfilController
};
use App\Http\Controllers\Perawat\{
    RekamMedisController as PerawatRekamMedisController,
    PasienController as PerawatPasienController,
    ProfilController as PerawatProfilController
};
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

# HALAMAN PUBLIK (SITE)
Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'home')->name('site.home');
    Route::get('/struktur', 'struktur')->name('site.struktur');
    Route::get('/layanan', 'layanan')->name('site.layanan');
    Route::get('/lokasi', 'lokasi')->name('site.lokasi');
    Route::get('/visi', 'visi')->name('site.visi');
    Route::get('/jadwal', 'jadwal')->name('site.jadwal');
});


# AUTHENTIKASI USER
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::get('/logout', 'logout')->name('logout');
});


# DASHBOARD AREA
Route::prefix('dashboard')->group(function () {

    // ✅ ADMIN
    Route::middleware(['auth', 'isAdmin'])
        ->get('/admin', [AdminHomeController::class, 'index'])
        ->name('dashboard.admin');

    // ✅ DOKTER
    Route::middleware(['auth', 'isDokter'])
        ->get('/dokter', fn() => view('dashboard.dokter.index'))
        ->name('dashboard.dokter');

    // ✅ PERAWAT
    Route::middleware(['auth', 'isPerawat'])
        ->get('/perawat', fn() => view('dashboard.perawat.index'))
        ->name('dashboard.perawat');

    // ✅ RESEPSIONIS
    Route::middleware(['auth', 'isResepsionis'])
        ->get('/resepsionis', fn() => view('dashboard.resepsionis.index'))
        ->name('dashboard.resepsionis');

    // ✅ PEMILIK
    Route::middleware(['auth', 'isPemilik'])
        ->get('/pemilik', fn() => view('dashboard.pemilik.index'))
        ->name('dashboard.pemilik');

    // Halaman Data Master
    Route::middleware(['auth', 'isAdmin'])
        ->get('/admin/data', fn() => view('dashboard.admin.data_master'))
        ->name('dashboard.admin.data');
});


# ADMIN AREA
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {

    # Data User
    Route::resource('data-user', DataUserController::class);
    Route::post('data-user/{id}/reset', [DataUserController::class, 'reset'])->name('data-user.reset');

    # Manajemen Role User
Route::prefix('role-user')->name('role-user.')->group(function () {
    Route::get('/', [RoleUserController::class, 'index'])->name('index');
    Route::post('/', [RoleUserController::class, 'store'])->name('store');
    Route::post('/create-role', [RoleUserController::class, 'createRole'])->name('createRole'); // 🆕 tambah role baru
    Route::get('/set-active/{iduser}/{idrole}', [RoleUserController::class, 'setActive'])->name('setActive');
    Route::post('/set-active-confirm', [RoleUserController::class, 'setActiveConfirm'])->name('setActiveConfirm');
    Route::get('/deactivate/{iduser}/{idrole}', [RoleUserController::class, 'deactivate'])->name('deactivate');
    Route::post('/deactivate-confirm', [RoleUserController::class, 'deactivateConfirm'])->name('deactivateConfirm');
    Route::post('/destroy-confirm', [RoleUserController::class, 'destroyConfirm'])->name('destroyConfirm');
    Route::post('/create-role', [RoleUserController::class, 'createRole'])->name('createRole');
    Route::post('/destroy-role/{id}', [RoleUserController::class, 'destroyRole'])->name('destroyRole');
    Route::post('/restore-role/{id}', [RoleUserController::class, 'restoreRole'])->name('restoreRole');

});


    # Data Master Resources
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

    # Soft Delete Restore Routes
    Route::post('/pemilik/{id}/restore', [PemilikController::class, 'restore'])->name('pemilik.restore');
    Route::post('/pet/{id}/restore', [PetController::class, 'restore'])->name('pet.restore');
    Route::post('/data-user/{id}/restore', [DataUserController::class, 'restore'])->name('data-user.restore');
    Route::post('/jenis-hewan/{id}/restore', [JenisHewanController::class, 'restore'])->name('jenis-hewan.restore');
    Route::post('/ras-hewan/{id}/restore', [RasHewanController::class, 'restore'])->name('ras-hewan.restore');
    Route::post('/kategori/{id}/restore', [KategoriController::class, 'restore'])->name('kategori.restore');
    Route::post('/kategori-klinis/{id}/restore', [KategoriKlinisController::class, 'restore'])->name('kategori-klinis.restore');
    Route::post('/kode-tindakan-terapi/{id}/restore', [KodeTindakanTerapiController::class, 'restore'])->name('kode-tindakan-terapi.restore');
    Route::post('/rekam-medis/{id}/restore', [RekamMedisController::class, 'restore'])->name('rekam-medis.restore');

   # Laporan Relasi
    Route::get('/laporan-relasi', [RelasiController::class, 'index'])->name('laporan.relasi');


});


// DOKTER AREA
Route::prefix('dokter')->middleware(['auth', 'isDokter'])->name('dokter.')->group(function () {
    Route::resource('rekam-medis', DokterRekamMedisController::class)->except(['destroy']);

    Route::get('/pasien', [DokterPasienController::class, 'index'])->name('pasien.index');
    Route::get('/profil', [DokterProfilController::class, 'index'])->name('profil.index');

    Route::post('/rekam-medis/{rekam}/tindakan', [DokterRekamMedisController::class, 'storeTindakan'])
        ->name('rekam-medis.tindakan.store');

    Route::put('/rekam-medis/{rekam}/tindakan/{detail}', [DokterRekamMedisController::class, 'updateTindakan'])
        ->name('rekam-medis.tindakan.update');
});


# PERAWAT AREA
Route::prefix('perawat')->middleware(['auth', 'isPerawat'])->name('perawat.')->group(function () {
    // CRUD rekam medis
    Route::resource('rekam-medis', PerawatRekamMedisController::class)->except(['destroy']);
    Route::post('/rekam-medis/{id}/tindakan', [PerawatRekamMedisController::class, 'tambahTindakan'])->name('rekam-medis.tindakan.store');
    Route::put('/rekam-medis/tindakan/{iddetail}', [PerawatRekamMedisController::class, 'updateTindakan'])->name('rekam-medis.tindakan.update');
    Route::delete('/rekam-medis/tindakan/{iddetail}', [PerawatRekamMedisController::class, 'hapusTindakan'])->name('rekam-medis.tindakan.destroy');

    // View Data Pasien & Profil
    Route::get('/pasien', [PerawatPasienController::class, 'index'])->name('pasien.index');
    Route::get('/profil', [PerawatProfilController::class, 'index'])->name('profil.index');
});


# PEMILIK AREA
Route::prefix('pemilik')->middleware(['auth', 'isPemilik'])->name('pemilik.')->group(function () {
    // Dashboard
    Route::get('/', [PemilikHomeController::class, 'index'])->name('home');

    // Data Hewan
    Route::resource('daftar-pet', PemilikDaftarPetController::class)->except(['show', 'destroy']);

    // Reservasi
    Route::resource('reservasi', PemilikReservasiController::class)->only(['index', 'create', 'store']);

    // Rekam Medis
    Route::resource('rekam-medis', PemilikRekamMedisController::class)->only(['index', 'show', 'create', 'store']);

    // Profil Pemilik
    Route::get('/profil', [\App\Http\Controllers\Pemilik\ProfilController::class, 'index'])
        ->name('profil.index');
});


# RESEPSIONIS AREA
Route::prefix('resepsionis')->middleware(['auth', 'isResepsionis'])->name('resepsionis.')->group(function () {
    Route::get('/', [ResepsionisHomeController::class, 'index'])->name('home');
    Route::resource('temu-dokter', ResepsionisTemuDokterController::class)->except(['show', 'edit']);
    Route::resource('registrasi-pemilik', ResepsionisPemilikController::class)->only(['create', 'store']);
    Route::resource('registrasi-pet', ResepsionisPetController::class)->only(['create', 'store']);
});

# CEK KONEKSI & DATA
Route::controller(CekKoneksiController::class)->group(function () {
    Route::get('/cek-koneksi', 'index')->name('cek.koneksi');
    Route::get('/cek-data', 'data')->name('cek.data');
});

# HOME ROUTE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
