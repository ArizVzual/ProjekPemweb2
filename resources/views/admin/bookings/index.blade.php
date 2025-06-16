@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pemesanan Ruangan</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($bookings->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->user->name }} ({{ $booking->user->nim }})</td>
                        <td>{{ $booking->nama_ruangan }}</td>
                        <td>{{ $booking->tanggal }}</td>
                        <td>{{ $booking->waktu }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                        <td>
                            @if ($booking->status === 'pending')
                                <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Setujui</button>
                                </form>
                                <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                            @else
                                <span class="text-muted">Sudah {{ $booking->status }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data pemesanan.</p>
    @endif
</div>
@endsection
