<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\User as UserPath;
use \App\Http\Controllers\Guru as GuruPath;
use \App\Http\Controllers\Admin as AdminPath;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('user')->group(function () {
    Route::get('/home', [UserPath\HomeControllers::class, 'redirectHome']);
    // Route::get('/kelas', [UserPath\KelasControllers::class, 'redirectKelas']);
    Route::get('/pelajaran', [UserPath\KelasControllers::class, 'redirectPelajaran']);
    Route::get('/materi/{id_pelajaran}', [UserPath\KelasControllers::class, 'redirectMateri']);
    Route::get('/detail_materi/{id_materi}', [UserPath\KelasControllers::class, 'redirectDetailMateri']);
    Route::get('/soal_materi/{id_materi}', [UserPath\KelasControllers::class, 'redirectSoalMateri']);
    Route::get('/profile', [UserPath\KelasControllers::class, 'redirectProfile']);
});

Route::prefix('guru')->group(function () {
    Route::get('/home', [GuruPath\HomeControllers::class, 'redirectHome']);
    Route::get('/kelas', [GuruPath\KelasControllers::class, 'kelas']);
    Route::get('/pelajaran', [GuruPath\PelajaranControllers::class, 'redirectPelajaran']);
    Route::get('/tambah_kelas', [GuruPath\KelasControllers::class, 'tambah_kelas']);
    Route::get('/tambah_pelajaran', [GuruPath\PelajaranControllers::class, 'redirectAddPelajaran']);
    Route::get('/materi/{id_pelajaran}', [GuruPath\MateriControllers::class, 'redirectMateri']);
    Route::get('/tambah_materi/{id_pelajaran}', [GuruPath\MateriControllers::class, 'redirectAddMateri']);
    Route::get('/detail_kelas/{id_kelas}', [GuruPath\KelasControllers::class, 'redirectDetailKelas']);
    Route::get('/detail_materi/{id_materi}', [GuruPath\KelasControllers::class, 'redirectDetailMateri']);
    Route::get('/profile', [GuruPath\KelasControllers::class, 'redirectProfileGuru']);
    Route::get('/jawaban/{id_user}/{uniqid_id}', [GuruPath\KelasControllers::class, 'redirectJawaban']);
});

Route::prefix('admin')->group(function () {
    Route::get('/user', [AdminPath\UserControllers::class, 'redirectUser']);
});