@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: yellow;
    }
    .booking-container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 90vh;
    }
    .form-wrapper {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        max-width: 600px;
        width: 100%;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>

<div class="booking-container">
    <div class="form-wrapper">
        <div class="text-center mb-4">
            <img src="{{ asset('logo_ulm1.png') }}" width="100" alt="ULM Logo">
            <h5 class="mt-2">Universitas Lambung Mangkurat</h5>
        </div>

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf

            {{-- Pilih Ruangan --}}
            <div class="mb-3">
                <label for="room_id" class="form-label">Pilih Ruangan</label>
                <select name="room_id" id="room_id" class="form-select" required>
                    <option value="">-- Pilih Ruangan --</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->nama }} (Kapasitas: {{ $room->kapasitas }})</option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            {{-- Jam Mulai --}}
            <div class="mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
            </div>

            {{-- Jam Selesai --}}
            <div class="mb-3">
                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">Cancel</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
</div>
@endsection
