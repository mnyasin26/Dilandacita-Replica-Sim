<?php

use App\Http\Controllers\AktaLahirController;
use App\Http\Controllers\ApprovalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IssuesController;
use App\Http\Controllers\MainMenu;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SubmissionDetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
// use Auth
// use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pengajuan', [MainMenu::class, 'index'])->name('pengajuan');
Route::get('/dashboard', [MainMenu::class, 'dashboard'])->name('dashboard');
Route::get('/pengajuan/akta-kelahiran', [AktaLahirController::class, 'create'])->name('akta-kelahiran');
Route::get('/pengajuan/akta-kelahiran/create', [AktaLahirController::class, 'create'])->name('akta-kelahiran.create');
Route::post('/pengajuan/akta-kelahiran', [AktaLahirController::class, 'store'])->name('akta-kelahiran.store');
Route::get('/pengajuan/akta-kelahiran/{id}/edit', [AktaLahirController::class, 'edit'])->name('akta-kelahiran.edit');
Route::put('/pengajuan/akta-kelahiran/{id}', [AktaLahirController::class, 'update'])->name('akta-kelahiran.update');

Route::get('/akta-kelahiran/{id}/edit', [AktaLahirController::class, 'edit'])->name('akta-kelahiran.edit');
Route::put('/akta-kelahiran/{id}', [AktaLahirController::class, 'update'])->name('akta-kelahiran.update');

Route::get('/pengaturan', [UserController::class, 'index'])->name('pengaturan');
// Route::get('/dashboard/detail', [SubmissionDetailController::class, 'index'])->name('dashboard.detail');
Route::get('/dashboard/{id}/detail', [SubmissionDetailController::class, 'detail'])->name('dashboard.detail');

Route::get('/verifikasi', [VerificationController::class, 'index'])->name('verifikasi');

Route::get('/persetujuan', [ApprovalController::class, 'index'])->name('persetujuan');

Route::get('/penerbitan', [IssuesController::class, 'index'])->name('penerbitan');

Route::put('/user/{id}/update-role', [UserController::class, 'updateRole'])->name('user.updateRole');
Route::put('/user/{id}/update-kategori', [UserController::class, 'updateKategori'])->name('user.updateKategori');
Route::put('/user/{id}/update-telepon', [UserController::class, 'updateTelepon'])->name('user.updateTelepon');
Route::put('/user/{id}/update-email', [UserController::class, 'updateEmail'])->name('user.updateEmail');
