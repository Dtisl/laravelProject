<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use \App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.view');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.view');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware(['auth', CheckUserRole::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.view');
    Route::patch('/profile/{appointment}', [ProfileController::class, 'deleteProfileAppointment'])->name('profile.appointment.delete');
    Route::get('/profile/appointment', [ProfileController::class, 'showAppointment'])->name('profile.appointment');
    Route::patch('/profile/appointment/{appointment}', [ProfileController::class, 'createProfileAppointment'])->name('profile.appointment.create');

    Route::get('/admin', [AdminController::class, 'showAdmin'])->name('admin.view');
    Route::post('/admin', [AdminController::class, 'createMaster'])->name('master.add');
    Route::delete('/admin/{master}', [AdminController::class, 'deleteMaster'])->name('master.delete');
    Route::get('/admin/appointment/{master}', [AdminController::class, 'showMasterAppointment'])->name('master.appointment');
    Route::delete('/admin/appointment/{appointment}', [AdminController::class, 'deleteAppointment'])->name('appointment.delete');
    Route::post('/admin/appointment/{master}', [AdminController::class, 'addAppointment'])->name('master.add.appointment');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
