@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pemesanan Ruangan</h2>

    @foreach ($bookings as $booking)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $booking->nama_ruangan }}</h5>
                <p><strong>Peminjam:</strong> {{ $booking->user->name }} ({{ $booking->user->nim }})</p>
                <p><strong>Waktu:</strong> {{ $booking->tanggal }} - {{ $booking->waktu }}</p>
                <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>

                @if ($booking->status === 'pending')
                    <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-success btn-sm">Setujui</button>
                    </form>
                    <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-danger btn-sm">Tolak</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
