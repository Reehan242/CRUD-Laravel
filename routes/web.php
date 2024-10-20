<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;

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
    return view('welcome');
});
//Login
Route::get('/login', [LoginController::class, 'showloginform'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin']);

//memerlukan authentikasi 
Route::middleware('auth')->group(
    function () {
        Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');

        Route::get('/tambahpegawai', [PegawaiController::class, 'tambahpegawai'])->name('tambahpegawai');
        Route::post('/insertdata', [PegawaiController::class, 'insertdata'])->name('insertdata');
        Route::get('/tampilkandata/{id}', [PegawaiController::class, 'tampilkandata'])->name('tampilkandata');
        Route::post('/ubahdata/{id}', [PegawaiController::class, 'ubahdata'])->name('ubahdata');

        Route::get('/hapusdata/{id}', [PegawaiController::class, 'hapusdata'])->name('hapusdata');
        Route::get('/logout', [LoginController::class, 'actionlogout']);

        Route::get('/slipgaji/{id}', [PegawaiController::class, 'hitunggaji'])->name('hitunggaji');
        Route::post('/insertgaji', [PegawaiController::class, 'insertgaji'])->name('insertgaji');

        Route::get('/datagaji', [PegawaiController::class, 'datagaji'])->name('datagaji');
        Route::get('/hapusdatagaji/{id}', [PegawaiController::class, 'hapusdatagaji'])->name('hapusdatagaji');

        Route::get('/tampilslipgaji/{id}', [PegawaiController::class, 'tampilslipgaji'])->name('tampilslipgaji');
        Route::get('/search',[PegawaiController::class,'search'])->name('search');
        Route::get('/searchdate',[PegawaiController::class,'searchdate'])->name('searchdate');
        
        Route::get('/cetakslipgaji/{id}', [PegawaiController::class, 'cetakslipgaji'])->name('cetakslipgaji');
        Route::get('/cetaklaporangaji', [PegawaiController::class, 'cetaklaporangaji'])->name('cetaklaporangaji');
        
        
        
    }
);
