<?php

// use App\Http\Controllers\FormController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'pages'])->name('pages');

Route::get('form', [UserController::class, 'index']);
Route::post('/form/store', [UserController::class, 'store'])->name('student.store');

Route::group(['middleware' => 'isLogin', 'cekRole:admin,user'], function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('/profile/edit', [DashboardController::class, 'profile_edit'])->name('profile.edit');
        Route::patch('profile/store', [DashboardController::class, 'profile_store'])->name('profile.store');
    });

});

Route::middleware(['isLogin', 'cekRole:admin'])->group(function () {
    Route::get('/pembayaran/admin', [DashboardController::class, 'admin_pembayaran'])->name('admin.pembayaran');
    
    Route::get('/pembayaran/admin/detailpendafaran/{pembayaran:user_id}', [DashboardController::class, 'detail_pendaftaran'])->name('detail.pendaftaran');

    Route::get('/pembayaran/admin/detailpembayaran/{pembayaran:user_id}', [DashboardController::class, 'detail_pembayaran'])->name('detail.pembayaran');

    Route::patch('/pembayaran/admin/detailpembayaran/validasi/{pembayaran:user_id}', [DashboardController::class, 'validasi'])->name('validasi.detail.pendaftaran');
    Route::patch('/pembayaran/admin/detailpembayaran/tolak/{pembayaran:user_id}', [DashboardController::class, 'tolak'])->name('tolak.detail.pendaftaran');
    Route::get('/pemabayaran/all', [DashboardController::class, 'pembayaran_all'])->name('pembayaran.all');
});

Route::middleware(['isLogin', 'cekRole:user'])->group(function () {
    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::post('pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');  
    Route::patch('pembayaran/update', [PembayaranController::class, 'update'])->name('pembayaran.update');
});

Route::middleware('isGuest')->group(function () {
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login/auth', [AuthController::class, 'auth'])->name('login.auth');
});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/error', function () {
    return view('error');
});
