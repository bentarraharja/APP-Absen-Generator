<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\DataMahasiswaController;
use App\Http\Controllers\Backend\DataAsistenController;
use App\Http\Controllers\Backend\DataKelasController;
use App\Http\Controllers\Backend\DataMateriController;
use App\Http\Controllers\Backend\KodeGeneratorController;
use App\Http\Controllers\Backend\AbsensiController;
use App\Models\DataMahasiswa;

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
    return view('auth.login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout1');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(DataAsistenController::class)->group(function () {
    Route::get('/dataass/index', 'index')->name('indexDataAss');
    Route::get('/dataass/create', 'create')->name('createDataAss');
    Route::get('/dataass/edit/{id}', 'edit')->name('editDataAss');
    Route::post('/dataass/post', 'store')->name('storeDataAss');
    Route::post('/dataass/update/{id}', 'update')->name('updateDataAss');
    Route::get('/dataass/delete/{id}', 'destroy')->name('destroyDataAss');
});

Route::controller(DataKelasController::class)->group(function () {
    Route::get('/datakelas/index', 'index')->name('indexDataKelas');
    Route::get('/datakelas/create', 'create')->name('createDataKelas');
    Route::get('/datakelas/edit/{id}', 'edit')->name('editDataKelas');
    Route::post('/datakelas/post', 'store')->name('storeDataKelas');
    Route::post('/datakelas/update/{id}', 'update')->name('updateDataKelas');
    Route::get('/datakelas/delete/{id}', 'destroy')->name('destroyDataKelas');
});

Route::controller(DataMateriController::class)->group(function () {
    Route::get('/datamateri/index', 'index')->name('indexDataMateri');
    Route::get('/datamateri/create', 'create')->name('createDataMateri');
    Route::get('/datamateri/edit/{id}', 'edit')->name('editDataMateri');
    Route::post('/datamateri/post', 'store')->name('storeDataMateri');
    Route::post('/datamateri/update/{id}', 'update')->name('updateDataMateri');
    Route::get('/datamateri/delete/{id}', 'destroy')->name('destroyDataMateri');
});

Route::controller(KodeGeneratorController::class)->group(function () {
    Route::get('/kode/index', 'index')->name('indexKode');
    Route::get('/kode/generate/modul/{frommodule}', 'store')->name('generateKode');
    Route::get('/kode/generator/dash/{fromdashboard}', 'store')->name('generateKodeDash');
});

Route::controller(AbsensiController::class)->group(function () {
    Route::post('/absen/masuk', 'store')->name('storeAbsen');
    Route::get('/absen/keluar', 'updateAbsen')->name('updateAbsen');
});
