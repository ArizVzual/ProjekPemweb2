@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Peta Kampus ULM</h2>
    <div id="map" style="height: 500px;"></div>
</div>
@endsection

@section('scripts')
<!-- LeafletJS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    const map = L.map('map').setView([-3.443774, 114.810373], 17); // sesuaikan dengan koordinat ULM

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Contoh marker lokasi fakultas
    L.marker([-3.4435, 114.8107]).addTo(map)
        .bindPopup('<b>Fakultas Teknik</b><br>Gedung A')
        .openPopup();
</script>
@endsection
