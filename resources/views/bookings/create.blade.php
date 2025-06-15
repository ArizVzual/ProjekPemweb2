@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Pemesanan Ruangan</h2>

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf

        <div class="mb-3">
            <label for="room_id" class="form-label">Ruangan</label>
            <select name="room_id" class="form-control" required>
                <option value="">-- Pilih Ruangan --</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->nama_ruangan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Kirim Pemesanan</button>
    </form>
</div>
@endsection
