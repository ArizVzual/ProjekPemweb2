<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\{
    BookingController,
    RoomController,
    ScheduleController,
    DashboardController,
    Auth\RegisteredUserController,
    Auth\AuthenticatedSessionController
};

// ⏩ Halaman utama dashboard (redirect berdasarkan role)
// ✅ YANG BARU: langsung ke dashboard umum tanpa login
Route::get('/', [DashboardController::class, 'index'])->name('home');

// Login dan Register manual (kalau belum pakai Fortify full)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Redirect berdasarkan role setelah login
Route::get('/redirect-dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.bookings');
    }

    return redirect()->route('dashboard');
})->middleware(['auth'])->name('redirect.dashboard');

// 🧑‍💻 Dashboard user biasa
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// 👥 Admin Routes
// routes/web.php
Route::middleware(['auth']) // hilangkan 'admin'
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('bookings', BookingController::class);
    });


// 📆 Jadwal user
Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal');

// 🏠 Peta kampus
Route::get('/peta', [RoomController::class, 'index'])->name('peta');

// 📚 User Routes (Booking dan Room)
Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
    Route::resource('bookings', BookingController::class);
});

Route::get('/map', [RoomController::class, 'index'])->name('map.index');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/rooms/available', [RoomController::class, 'available'])->name('rooms.available');

Route::get('/bookings/history', [BookingController::class, 'history'])->name('bookings.history');

use App\Http\Controllers\Admin\BookingController as AdminBookingController;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
    Route::post('/bookings/{id}/approve', [AdminBookingController::class, 'approve'])->name('admin.bookings.approve');
    Route::post('/bookings/{id}/reject', [AdminBookingController::class, 'reject'])->name('admin.bookings.reject');
});

require __DIR__.'/auth.php';