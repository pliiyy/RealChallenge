<?php

use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\BarterJadwalController;
use App\Http\Controllers\DekanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KosmaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SekprodiController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SuratTugasMengajarController;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [User::class, 'login'])->name("login");
Route::post('/logout', [User::class, 'logout'])->name('logout');

// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::resource('roles', RoleController::class);
// });
Route::resource('kelas', KelasController::class);
Route::resource('fakultas', FakultasController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('semester', SemesterController::class);
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('dekan', DekanController::class);
Route::resource('angkatan', AngkatanController::class);
Route::resource('shift', ShiftController::class);
Route::resource('ruangan', RuanganController::class);
Route::resource('dosen', DosenController::class);
Route::resource('surat_tugas', SuratTugasMengajarController::class);
Route::resource('jadwal', JadwalController::class);
Route::resource('kaprodi', KaprodiController::class);
Route::resource('sekprodi', SekprodiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('kosma', KosmaController::class);
Route::resource('barter_jadwal', BarterJadwalController::class);

Route::get('/laporan/pdf/show', [PdfController::class, 'generateAndShow'])->name('laporan.pdf.show');

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/profil', function () {
    return view('profil');
});
Route::get('/data', function () {
    return view('data');
});
Route::get('/settings', function () {
    return view('settings');
});


// Route::get('/barter_jadwal', function () {
//     return view('barter_jadwal');
// });



Route::get('/api/provinces', function () {
    $response = Http::get('https://wilayah.id/api/provinces.json');
    return response()->json($response->json());
});
Route::get('/api/regencies/{provinceId}', function ($provinceId) {
    $response = Http::get("https://wilayah.id/api/regencies/{$provinceId}.json");
    return response()->json($response->json());
});

// Ambil daftar kecamatan berdasarkan ID kabupaten
Route::get('/api/districts/{regencyId}', function ($regencyId) {
    $response = Http::get("https://wilayah.id/api/districts/{$regencyId}.json");
    return response()->json($response->json());
});