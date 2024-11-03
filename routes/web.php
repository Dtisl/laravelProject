<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.view');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.view');
Route::patch('/profile/delete/{appointment}', [ProfileController::class, 'profileAppointmentDelete'])->name('profile.appointment.delete');
Route::get('/profile/appointment', [ProfileController::class, 'showAppointment'])->name('profile.appointment');
Route::patch('/profile/appointment/{appointment}', [ProfileController::class, 'profileAppointmentUpdate'])->name('profile.appointment.update');



Route::get('/admin', [AdminController::class, 'showAdmin'])->name('admin.view');
Route::post('/admin/master', [AdminController::class, 'addMaster'])->name('master.add');
Route::delete('/admin/master/{master}', [AdminController::class, 'deleteMaster'])->name('master.delete');
Route::get('/admin/appointment/{master}', [AdminController::class, 'showMasterAppointment'])->name('master.appointment');
Route::delete('/admin/appointment/{appointment}', [AdminController::class, 'deleteAppointment'])->name('appointment.delete');
Route::post('/admin/appointment/{master}', [AdminController::class, 'addAppointment'])->name('master.add.appointment');



