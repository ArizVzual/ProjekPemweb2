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
        'nama_ruangan' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'waktu' => 'required',
    ]);

        Booking::create([
        'user_id' => Auth::id(),
        'nama_ruangan' => $request->nama_ruangan,
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'status' => 'pending',
    ]);


        return redirect()->back()->with('success', 'Permohonan pemesanan telah dikirim!');
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

    public function history()
{
    // Misal kamu ingin menampilkan data booking user yang sedang login
    $bookings = auth()->user()->bookings()->latest()->get();

    return view('bookings.history', compact('bookings'));
}


}
