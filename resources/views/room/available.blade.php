@extends('layouts.app')

@section('content')
<h4>Ruangan Kosong Hari Ini</h4>

@if($availableRooms->isEmpty())
    <p>Tidak ada ruangan yang tersedia hari ini.</p>
@else
    <div class="row">
        @foreach ($availableRooms as $room)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->nama }}</h5>
                        <p>Kapasitas: {{ $room->kapasitas }}</p>
                        <a href="{{ route('bookings.create', ['room_id' => $room->id]) }}" class="btn btn-primary btn-sm">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
