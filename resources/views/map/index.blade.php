@extends('layouts.app')

@section('content')
    <h4>Peta Interaktif ULM</h4>

    <div class="d-flex flex-column flex-md-row">
        <div id="map" style="width: 100%; height: 500px;"></div>
            <div id="room-info" class="card ms-md-3 mt-3 mt-md-0 p-3 d-none" style="width: 100%; max-width: 300px;">
                <div class="card-body">
                    <h5 id="room-title" class="card-title">Judul Ruangan</h5>
                    <p id="room-desc" class="card-text">Deskripsi ruangan akan muncul di sini.</p>
                    <a id="room-book-btn" href="#" class="btn btn-primary mt-2">Pesan Ruangan</a>
                </div>
            </div>
    </div>

@endsection

@section('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([-3.2991, 114.5858], 18); // Koordinat awal kampus ULM

        // Tambahkan TileLayer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 22,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Looping data rooms dari Laravel
        @foreach ($rooms as $room)
            L.marker([{{ $room->latitude }}, {{ $room->longitude }}])
                .addTo(map)
                .bindPopup(`<b>{{ $room->nama }}</b><br>
                            Kapasitas: {{ $room->kapasitas }}<br>
                            {{ $room->deskripsi }}<br><br>
                            <a href="{{ route('bookings.create') }}?room_id={{ $room->id }}" class="btn btn-sm btn-primary mt-2">Pesan Ruangan</a>`)
                .on('click', function () {
                    document.getElementById('room-title').innerText = "{{ $room->nama }}";
                    document.getElementById('room-desc').innerText = "Kapasitas: {{ $room->kapasitas }} | {{ $room->deskripsi }}";
                    document.getElementById('room-info').classList.remove('d-none');
                });
        @endforeach
    </script>
@endsection

