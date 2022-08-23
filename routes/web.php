<?php

use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembiayaanController;
use App\Http\Controllers\UserController;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('dashboard.layout');
// });

Route::prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('dashboard.layout');
    })->name('dashboard');


    // URL Nasabah
    Route::get('nasabah', [NasabahController::class, 'index'])->name('nasabah');
    Route::get('/buat-nasabah', [NasabahController::class, 'create'])->name('nasabah.buat');
    Route::post('/tambah-nasabah', [NasabahController::class, 'store'])->name('nasabah.tambah');
    Route::get('/data-nasabah/{id}', [NasabahController::class, 'show'])->name('nasabah.detail');
    Route::get('/edit-nasabah/{id}', [NasabahController::class, 'edit'])->name('nasabah.edit');
    Route::post('/update-nasabah/{id}', [NasabahController::class, 'update'])->name('nasabah.update');
    Route::get('/delete-nasabah/{id}', [NasabahController::class, 'destroy'])->name('nasabah.delete');

    // URL Pembiayaan
    Route::get('pembiayaan', [PembiayaanController::class, 'index'])->name('pembiayaan');
    Route::get('/buat-pembiayaan', [PembiayaanController::class, 'create'])->name('pembiayaan.buat');
    Route::post('/tambah-pembiayaan', [PembiayaanController::class, 'store'])->name('pembiayaan.tambah');
    Route::get('/data-pembiayaan/{id}', [PembiayaanController::class, 'show'])->name('pembiayaan.detail');
    Route::get('/edit-pembiayaan/{id}', [PembiayaanController::class, 'edit'])->name('pembiayaan.edit');
    Route::post('/update-pembiayaan/{id}', [PembiayaanController::class, 'update'])->name('pembiayaan.update');
    Route::get('/delete-pembiayaan/{id}', [PembiayaanController::class, 'destroy'])->name('pembiayaan.delete');


    // URL Pembayaran
    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('/buat-pembayaran', [PembayaranController::class, 'create'])->name('pembayaran.buat');
    Route::post('/tambah-pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.tambah');
    Route::get('/data-pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.detail');
    Route::get('/edit-pembayaran/{id}', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::post('/update-pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::get('/delete-pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.delete');
    Route::get('/buat-pembayaran/get-id-nasabah', [PembayaranController::class, 'pembiayaanNasabah'])->name('pembayaran.get-id-nasabah');

    Route::get('users', [UserController::class, 'index'])->name('user.index');
    Route::get('/buat-user', [UserController::class, 'create'])->name('user.buat');
    Route::post('/tambah-user', [UserController::class, 'store'])->name('user.tambah');
    Route::get('/data-user/{id}', [UserController::class, 'show'])->name('user.detail');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/delete-user/{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('role', [RoleController::class, 'index'])->name('role.index');
    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('role/update', [RoleController::class, 'update'])->name('role.update');
    Route::get('role/show/{id}', [RoleController::class, 'show'])->name('role.show');
    Route::get('role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
