<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan semua booking milik user login
    public function index()
    {
        $bookings = Booking::with('room')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    // Form pemesanan
    public function create()
    {
        $rooms = Room::all();
        return view('bookings.create', compact('rooms'));
    }

    // Simpan pemesanan
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Pemesanan berhasil dibuat.');
    }

    // Admin: Verifikasi Pemesanan
    public function approve($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'approved';
    $booking->save();

    return redirect()->back()->with('status', 'Pesanan berhasil disetujui.');
}

public function reject($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'rejected';
    $booking->save();

    return redirect()->back()->with('status', 'Pesanan ditolak.');
}


    // Admin: Tampilkan semua booking
    // app/Http/Controllers/BookingController.php
    public function adminIndex()
    {
        $bookings = Booking::with('user', 'room')->orderBy('created_at', 'desc')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

}
