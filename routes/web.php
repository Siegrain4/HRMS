<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
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
    return view('auth/login');
});

Auth::routes();
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/informasi-karyawan', [App\Http\Controllers\HomeController::class, 'informasi'])->name('informasi-karyawan');

Route::get('/lihat-gaji-karyawan', [App\Http\Controllers\HomeController::class, 'lihatGaji'])->name('lihat-gaji-karyawan');

// Karyawan CRUD
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('daftar-karyawan');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('tambah-karyawan');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('simpan-karyawan');
Route::get('/karyawan/{id}', [KaryawanController::class, 'show'])->name('detail-karyawan');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('edit-karyawan');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('perbarui-karyawan');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('hapus-karyawan');
// Route::get('/karyawan/{id}/calculate-salary', [KaryawanController::class, 'calculateSalary'])->name('hitung-gaji-karyawan');
Route::get('/karyawan/{id}/salary', [KaryawanController::class, 'calculateSalary'])->name('calculate-salary');
Route::get('/karyawan/salary-overview', [KaryawanController::class, 'salaryOverview'])->name('salary-overview');

Route::get('/karyawan/{id}/edit-gaji', [KaryawanController::class, 'editGaji'])->name('edit-gaji-karyawan');
Route::put('/karyawan/{id}/update-gaji', [KaryawanController::class, 'updateGaji'])->name('update-gaji-karyawan');

Route::put('/karyawan/{id}/update-insentif', [KaryawanController::class, 'updateInsentif'])->name('update-insentif');

Route::get('/karyawan/list-nama-gaji', [KaryawanController::class, 'listNamaGaji'])->name('list-nama-gaji');
