<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
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
Route::get('/roles', function () {
    return view('roles');
});
Route::post('/roles', [RoleController::class,"create"]);
Route::get('/fakultas', function () {
    return view('fakultas');
});
Route::get('/prodi', function () {
    return view('prodi');
});
Route::get('/prodi', function () {
    return view('prodi');
});
Route::get('/semester', function () {
    return view('semester');
});
Route::get('/matakuliah', function () {
    return view('matakuliah');
});
Route::get('/jadwal', function () {
    return view('jadwal');
});
Route::get('/ruangan', function () {
    return view('ruangan');
});
Route::get('/kelas', function () {
    return view('kelas');
});
Route::get('/mahasiswa', function () {
    return view('mahasiswa');
});
Route::get('/dosen', function () {
    return view('dosen');
});
Route::get('/surat_tugas', function () {
    return view('surat_tugas');
});