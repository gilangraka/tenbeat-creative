<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopupController;
use App\Http\Middleware\AuthGlobalData;
use App\Http\Middleware\ShareMenus;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'shareMenus'])->name('dashboard');

Route::middleware(['auth', 'shareMenus'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/mitra-update', [DashboardController::class, 'mitraUpdate'])->name('mitra.update');
    Route::patch('/user-update', [DashboardController::class, 'klienUpdate'])->name('klien.update');

    Route::get('/resume-download/{nama_file}', [FileController::class, 'getResume']);
    Route::get('/unggahan-download/{nama_file}', [FileController::class, 'getUnggahan']);
    Route::get('/luaran-download/{nama_file}', [FileController::class, 'getLuaran']);

    Route::patch('/action-mitra/{id_mitra}/{status}', [AdminController::class, 'actionMitra'])->name('action.mitra');
    Route::get('/charge/{id_user}', [AdminController::class, 'charge'])->name('topup');

    Route::post('/addVideo', [ClientController::class, 'addVideo'])->name('add-video');
    Route::patch('/applyProject', [MitraController::class, 'applyProject'])->name('apply-project');
    Route::get('/projects', [MitraController::class, 'projects']);
    Route::patch('/set-luaran', [MitraController::class, 'setLuaran'])->name('set-luaran');
    Route::patch('/set-selesai', [MitraController::class, 'setSelesai'])->name('set-selesai');

    Route::post('/topup/store', [TopupController::class, 'submitTopup'])->name('topup.store');
    Route::get('/checkout/{id_token}', [TopupController::class, 'checkout'])->name('checkout');
    Route::get('/setcount', [TopupController::class, 'setCount'])->name('set.count');
});
require __DIR__ . '/auth.php';
