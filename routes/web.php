<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

// Admin - Booking routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings');
    Route::post('/bookings/{id}/approve', [BookingController::class, 'approve'])->name('admin.bookings.approve');
    Route::post('/bookings/{id}/reject', [BookingController::class, 'reject'])->name('admin.bookings.reject');
});

// Jadwal untuk user biasa
Route::get('/jadwal', [ScheduleController::class, 'index'])->name('schedules.index');

// Admin - Jadwal
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/schedules', [ScheduleController::class, 'adminIndex'])->name('admin.schedules.index');
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('admin.schedules.create');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('admin.schedules.store');
});

// Booking dan Room untuk user biasa
Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
    Route::resource('bookings', BookingController::class);
});

// Peta (semua bisa akses)
Route::get('/peta', function () {
    return view('peta');
})->name('peta');

// Route login manual (hanya sementara)
Route::get('/login', function () {
    return 'Silakan login dulu.';
})->name('login');

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/', [DashboardController::class, 'index'])->name('home');


