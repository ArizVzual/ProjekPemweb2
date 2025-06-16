<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Menampilkan semua pemesanan untuk admin
    public function index()
{
    $bookings = \App\Models\Booking::with('user')->orderBy('tanggal', 'desc')->get();
    return view('admin.bookings.index', compact('bookings'));
}


    // Setujui pemesanan
    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->back()->with('success', 'Pemesanan telah disetujui.');
    }

    // Tolak pemesanan
    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->back()->with('success', 'Pemesanan telah ditolak.');
    }
}
