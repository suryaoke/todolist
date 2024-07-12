<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\AbsensiController;
use App\Http\Controllers\Pos\ExportController;
use App\Http\Controllers\Pos\GuruController;
use App\Http\Controllers\Pos\HariController;
use App\Http\Controllers\Pos\InfoController;
use App\Http\Controllers\Pos\JadwalmapelController;
use App\Http\Controllers\Pos\JurusanController;
use App\Http\Controllers\Pos\KelasController;
use App\Http\Controllers\Pos\KkmController;
use App\Http\Controllers\Pos\MapelController;
use App\Http\Controllers\Pos\OrangTuaController;
use App\Http\Controllers\Pos\PengampuController;
use App\Http\Controllers\Pos\RombelController;
use App\Http\Controllers\Pos\RuanganController;
use App\Http\Controllers\Pos\SeksiController;
use App\Http\Controllers\Pos\SiswaController;
use App\Http\Controllers\Pos\StandarkompetensiController;
use App\Http\Controllers\Pos\TahunajarController;
use App\Http\Controllers\Pos\TugasController;
use App\Http\Controllers\Pos\WalasController;
use App\Http\Controllers\Pos\UserController;
use App\Http\Controllers\Pos\WaktuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\vendor\Chatify\MessagesController;
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

Route::get('/', function () {
    return view('auth.login');
})->name('login');



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');
