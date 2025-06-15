<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Room;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // User lihat jadwal
    public function index()
    {
        $schedules = Schedule::with('room')->orderBy('tanggal')->get();
        return view('schedules.index', compact('schedules'));
    }

    // Admin - form tambah
    public function create()
    {
        $rooms = Room::all();
        return view('admin.schedules.create', compact('rooms'));
    }

    // Admin - simpan jadwal
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'room_id' => 'required|exists:rooms,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'penanggung_jawab' => 'nullable|string|max:255',
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal ditambahkan.');
    }

    // Admin lihat semua jadwal
    public function adminIndex()
    {
        $schedules = Schedule::with('room')->latest()->get();
        return view('admin.schedules.index', compact('schedules'));
    }
}

