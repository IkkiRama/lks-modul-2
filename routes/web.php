<?php

use App\Http\Middleware\CekRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;

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
//     return view('index', [
//         'titile'=> "home"
//     ]);
// });


// Route::get('/', function () {
//     return view('index', [
//         'titile'=> "home"
//     ]);
// });


Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);




// Route::group(["middleware"=>"auth"], function (){
//     Route::get('/', [DashboardController::class, 'index']);
// });

// ->middleware(CekR::class);



Route::group(["middleware"=>["auth", "CekRole:guru,siswa,admin"]], function (){
    Route::get('/', [DashboardController::class, 'index']);
});


Route::group(["middleware"=>["auth"]], function (){


Route::get('/siswa/presensi', [SiswaController::class, 'index']);
Route::get('/siswa/presensi/konfirmasi/{presensi}', [SiswaController::class, 'create']);
Route::post('/siswa/presensi/konfirmasi/{presensi}', [SiswaController::class, 'store']);
Route::get('/siswa/presensi/ubahKonfirmasi/{presensi}', [SiswaController::class, 'edit']);
Route::put('/siswa/presensi/ubahKonfirmasi/{presensi}', [SiswaController::class, 'update']);

Route::get('/guru/presensi', [GuruController::class, 'index']);
Route::get('/guru/presensi/tambah', [GuruController::class, 'create']);
Route::post('/guru/presensi/tambah', [GuruController::class, 'store']);
Route::get('/guru/presensi/ubah/{presensi}', [GuruController::class, 'edit']);
Route::put('/guru/presensi/ubah/{presensi}', [GuruController::class, 'update']);
Route::get('/guru/presensi/hapus/{presensi}', [GuruController::class, 'destroy']);
Route::get('/guru/presensi/eksporPDF', [GuruController::class, 'exportPDF']);
Route::get('/guru/presensi/detail/{presensi}', [GuruController::class, 'show']);

});
