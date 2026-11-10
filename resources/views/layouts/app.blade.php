<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#c8bfe7">
    <meta name="description" content="OurKelas - Jadwal dan Tugas MataKuliah.">
    <title>@yield('title', 'OurKelas')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @if (! request()->routeIs('login'))
        <div class="app-shell">
            <x-navbar :username="$username ?? 'Mahasiswa'" />
            <div class="main-shell">
                <main class="main-content">
                    @yield('content')
                </main>
                <x-footer :username="$username ?? 'Mahasiswa'" />
            </div>
        </div>
    @else
        @yield('content')
    @endif
</body>
</html>
