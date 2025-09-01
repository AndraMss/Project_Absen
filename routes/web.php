<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\UserManualController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group( function() {
    Route::get('/user', [UserManualController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserManualController::class, 'create'])->name('user.create');
    Route::post('/user', [UserManualController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserManualController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserManualController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserManualController::class, 'destroy'])->name('user.destroy');
    Route::get('/laporan', [AbsenController::class, 'index'])->name('absen.index');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', [AbsenController::class, 'create'])->name('absen.create');
Route::post('/', [AbsenController::class, 'store'])->name('absen.store');

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//update test