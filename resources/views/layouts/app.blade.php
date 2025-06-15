<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ULM Realtime</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- jika kamu pakai CSS manual -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('head')
</head>
<body>
    <div id="app" class="d-flex">
        {{-- Sidebar --}}
        <aside class="bg-danger text-white p-3" style="width: 250px; min-height: 100vh;">
            <div class="text-center mb-4">
                <img src="{{ asset('images/ulm_logo.png') }}" alt="Logo" width="100">
                <h5 class="mt-2">Universitas Lambung Mangkurat</h5>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('home') }}">🏠 Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('jadwal') }}">🗓️ Jadwal</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('chat') }}">💬 Chat</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('peta') }}">🗺️ Map ULM</a></li>
            </ul>
            <div class="mt-auto text-white-50 text-sm">Need Help</div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
