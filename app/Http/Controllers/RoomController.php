<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all(); // Ambil semua data ruangan
        return view('map.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }

    public function available()
{
    // Misal logika sederhana: ambil ruangan yang belum ada booking hari ini
    $today = now()->toDateString();

    $usedRoomIds = \App\Models\Booking::whereDate('tanggal', $today)
        ->pluck('room_id')
        ->toArray();

    $availableRooms = Room::whereNotIn('id', $usedRoomIds)->get();

    return view('rooms.available', compact('availableRooms'));
}

}
