@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Riwayat Pemesanan</h4>

    @if ($bookings->isEmpty())
        <p class="text-muted">Belum ada riwayat pemesanan.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->room->nama }}</td>
                        <td>{{ $booking->tanggal }}</td>
                        <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
