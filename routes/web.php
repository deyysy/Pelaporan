<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\User\LaporanController as UserLaporanController;
use App\Http\Controllers\User\TanggapanController as UserTanggapanController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.landing');

Route::middleware(['IsMasyarakat'])->group(function(){
  // Laporan Pengaduan
  Route::post('/store', [UserController::class, 'StorePengaduan'])->name('user.store');
  Route::get('/laporan/{pengguna?}', [UserLaporanController::class, 'laporan'])->name('user.laporan');
  Route::get('/laporan/edit/{id_pengaduan?}', [UserLaporanController::class, 'edit'])->name('laporan.edit');
  Route::post('/update/{id_pengaduan?}', [UserLaporanController::class, 'update'])->name('laporan.update');
  Route::delete('/laporan/{pengguna?}', [UserLaporanController::class, 'delete'])->name('laporan.delete');

  // Tanggapan Petugas
  Route::get('/tanggapan/{pengguna?}', [UserTanggapanController::class, 'show'])->name('user.tanggapan');
  
  // Logout User
  Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::middleware(['guest'])->group(function(){
  // Login | User
  Route::get('/login/user', [UserController::class, 'FormLog'])->name('user.formlog');
  Route::post('/login/user/auth', [UserController::class, 'login'])->name('user.Login');

  // Register | User
  Route::get('/register', [UserController::class, 'Formregister'])->name('user.Formregister');
  Route::post('/register/auth', [UserController::class, 'register'])->name('user.register'); 
});


Route::prefix('admin')->group(function(){
    Route::middleware(['IsAdmin'])->group(function(){
      // Admin | Petugas
      Route::resource('petugas', PetugasController::class);

      // Admin | Masyarakat
      Route::resource('masyarakat', MasyarakatController::class);

      // Laporan
      Route::get('data-laporan', [LaporanController::class, 'index'])->name('laporan.index');
      Route::post('getlaporan', [LaporanController::class, 'getlaporan'])->name('laporan.getlaporan');
      Route::get('/generatePDF/{from}/{to}', [LaporanController::class, 'generatePDF'])->name('laporan.generate');
    });
    
    Route::middleware(['IsPetugas'])->group(function(){
      // Admin | Dashboard
      Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
      // Admin | Pengaduan
      Route::resource('pengaduan', PengaduanController::class);
      // Admin | Tanggapan
      Route::post('tanggapan/createORupdate', [TanggapanController::class, 'createORupdate'])->name('tanggapan.createORupdate');
      // Logout
      Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    });

    Route::middleware(['IsGuest'])->group(function(){
      // Auth Admin
      Route::get('/login', [AuthController::class, 'formLogin'])->name('auth.formlogin');
      Route::post('/login/admin/auth', [AuthController::class, 'login'])->name('auth.loginAdmin');
    });
});

