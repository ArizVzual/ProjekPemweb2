@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Dashboard</h2>
    <a href="{{ route('bookings.create') }}" class="btn btn-dark">Pesan Ruangan</a>
</div>

{{-- Tombol Navigasi --}}
<div class="row mb-4">
    <div class="col-md-4 mb-2">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Map</h5>
                <p class="card-text">Tampil Peta Lokasi ULM</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Jadwal Hari Ini</h5>
                <p class="card-text">Connected with Server</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Chat</h5>
                <p class="card-text">Active on site</p>
            </div>
        </div>
    </div>
</div>

{{-- Peta --}}
<h4>Map</h4>
<div class="mb-4">
    <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=114.598%2C-3.319%2C114.608%2C-3.313&layer=mapnik" width="100%" height="250" style="border:1px solid #ccc;"></iframe>
</div>

{{-- Kegiatan Ruangan --}}
<h4>Kegiatan Ruangan</h4>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-center p-3">
            <strong>Senin</strong>
            <span>R.23</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center p-3">
            <strong>Selasa</strong>
            <span>R.25</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center p-3">
            <strong>Rabu</strong>
            <span>F.Hasan</span>
        </div>
    </div>
</div>

{{-- Komentar --}}
<h4>Komentar</h4>
<div class="mb-4">
    @foreach (['Bryan', 'Alex', 'Sandra'] as $name)
    <div class="card bg-primary text-white mb-2">
        <div class="card-body">
            <h6 class="card-title mb-1">{{ $name }} ★★★★☆</h6>
            <p class="card-text">Komentar pengguna.</p>
        </div>
    </div>
    @endforeach
    <button class="btn btn-outline-secondary btn-sm">See more...</button>
</div>

{{-- Kapasitas Ruangan --}}
<h4>Daftar Ruangan & Kapasitas</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Ruangan</th>
            <th>Kapasitas</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>F.Hasan</td><td>35</td></tr>
        <tr><td>R.25</td><td>25</td></tr>
        <tr><td>R.23</td><td>60</td></tr>
        <tr><td>Lab.Mipa</td><td>25</td></tr>
    </tbody>
</table>
@endsection
