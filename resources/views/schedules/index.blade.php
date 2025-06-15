@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Jadwal Kegiatan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
            <tr>
                <td>{{ $schedule->nama_kegiatan }}</td>
                <td>{{ $schedule->room->nama }}</td>
                <td>{{ $schedule->tanggal }}</td>
                <td>{{ $schedule->jam_mulai }} - {{ $schedule->jam_selesai }}</td>
                <td>{{ $schedule->penanggung_jawab ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
