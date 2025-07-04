<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ULM Realtime</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Leaflet CSS (untuk peta) --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    {{-- CSS lokal jika ada --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('scripts')
@yield('scripts')

</head>
<body>
    <div id="app" class="d-flex flex-column flex-md-row min-vh-100">

        {{-- Sidebar --}}
        <aside class="bg-danger text-white p-3" style="width: 250px;">
            <div class="text-center mb-4">
                <img src="{{ asset('logo_ulm1.png') }}" alt="Logo" width="100">
                <h5 class="mt-2 text-white">Universitas Lambung Mangkurat</h5>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('home') }}">🏠 Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('jadwal') }}">🗓️ Jadwal</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('peta') }}">🗺️ Map ULM</a></li>
            </ul>
            <div class="mt-auto small text-white-50 pt-5">Need Help?</div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>
