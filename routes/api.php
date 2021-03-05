<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth as AuthPath;
use \App\Http\Controllers\User as UserPath;
use \App\Http\Controllers\Guru as GuruPath;
use \App\Http\Controllers\Admin as AdminPath;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthPath\LoginControllers::class, 'AuthLogin']);
Route::post('/logout', [AuthPath\LoginControllers::class, 'AuthLogout'])->middleware('auth')->name('logout');

Route::prefix('user')->group(function () {
    Route::get('/get_kelas', [UserPath\KelasControllers::class, 'get_kelas']);
    Route::get('/get_pelajaran/{id_kelas}', [UserPath\KelasControllers::class, 'get_pelajaran']);
    Route::get('/get_materi/{id_pelajaran}', [UserPath\KelasControllers::class, 'get_materi']);
    Route::post('/check_absen', [UserPath\KelasControllers::class, 'check_absen']);
    Route::get('/get_detailmateri/{id_materi}', [UserPath\KelasControllers::class, 'get_detailmateri']);
    Route::post('/absen_sekarang', [UserPath\KelasControllers::class, 'absen_sekarang']);
    Route::get('/get_soalmateri/{id_materi}', [UserPath\KelasControllers::class, 'get_soalmateri']);
    Route::post('/submit_jawaban', [UserPath\KelasControllers::class, 'submit_jawaban']);
    Route::get('/get_profile', [UserPath\KelasControllers::class, 'get_profile']);
    Route::post('/profile/perbarui', [UserPath\KelasControllers::class, 'updateProfile']);
    Route::post('/perbarui_pass', [UserPath\KelasControllers::class, 'perbarui_pass']);
});

Route::prefix('guru')->group(function () {
    Route::post('/tambah_kelas', [GuruPath\KelasControllers::class, 'create_kelas']);
    Route::get('/get_user/{id_kelas}', [GuruPath\KelasControllers::class, 'get_user']);
    Route::get('/get_user_class', [GuruPath\KelasControllers::class, 'get_user_class']);
    Route::get('/get_user_add_class/{id_kelas}', [GuruPath\KelasControllers::class, 'get_user_add_class']);
    
    Route::post('/add_user_class', [GuruPath\KelasControllers::class, 'add_user_class']);
    Route::get('/get_pelajaran', [GuruPath\PelajaranControllers::class, 'get_pelajaran']);
    Route::post('/tambah_pelajaran', [GuruPath\PelajaranControllers::class, 'tambah_pelajaran']);
    Route::get('/get_materi/{id_pelajaran}', [GuruPath\MateriControllers::class, 'get_materi']);
    Route::post('/tambah_materi', [GuruPath\PelajaranControllers::class, 'tambah_materi']);
    Route::get('/get_detailmateri/{id_materi}', [GuruPath\KelasControllers::class, 'get_detailmateri']);
    Route::get('/get_siswamateri/{id_materi}', [GuruPath\KelasControllers::class, 'get_siswamateri']);
    Route::post('/get_detail_jawaban', [GuruPath\KelasControllers::class, 'get_detail_jawaban']);
});

Route::prefix('admin')->group(function () {
    Route::post('/tambah_user', [AdminPath\UserControllers::class, 'tambah_user']);
    Route::get('/get_user', [AdminPath\UserControllers::class, 'get_user']);
    Route::post('/reset_password', [AdminPath\UserControllers::class, 'reset_password']);
});