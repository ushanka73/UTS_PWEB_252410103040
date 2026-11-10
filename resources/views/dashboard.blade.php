@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-stack">
    @include('partials.page-heading', ['title' => 'Dashboard'])

    <section class="welcome-banner">
        <p class="welcome-date">{{ $tanggalHariIni }}</p>
        <h2>Privet, {{ $username }}!</h2>
    </section>

    <section class="dashboard-layout">
        <div class="panel">
            <div class="section-heading">
                <h2>Jadwal hari ini</h2>
                <a href="{{ route('pengelolaan', ['username' => $username, 'hari' => $hariNavigasi]) }}" class="text-link">Lihat semua</a>
            </div>

            <div class="schedule-list">
                @forelse ($jadwalHariIni as $item)
                    <article class="schedule-card">
                        <div class="schedule-time">
                            <strong>{{ $item['waktu'] }}</strong>
                            <small>{{ $item['kode'] }}</small>
                        </div>
                        <div class="schedule-color tone-{{ $item['warna'] }}"></div>
                        <div class="schedule-details">
                            <h3>{{ $item['mata_kuliah'] }}</h3>
                            <p>{{ $item['dosen'] }}</p>
                            <small>{{ $item['ruangan'] }}</small>
                        </div>
                        <span class="course-label">Perkuliahan</span>
                    </article>
                @empty
                    <div class="empty-state">
                        <strong>Tidak ada jadwal hari ini</strong>
                    </div>
                @endforelse
            </div>
        </div>

        <aside class="dashboard-side">
            <article class="stat-card">
                <p>Kelas hari ini</p>
                <strong>{{ count($jadwalHariIni) }}</strong>
            </article>
            <article class="stat-card">
                <p>Tugas Belum Selesai</p>
                <strong>{{ count($tugasAktif) }}</strong>
            </article>
            <article class="stat-card">
                <p>Tugas selesai</p>
                <strong>{{ $jumlahTugasSelesai }}</strong>
            </article>

            <div class="panel">
                <div class="section-heading">
                    <h2>Deadline terdekat</h2>
                    <span class="priority-label">Prioritas</span>
                </div>

                @forelse ($tugasPrioritas as $item)
                    <article class="deadline-item">
                        <div>
                            <strong>{{ $item['nama'] }}</strong>
                            <small>{{ $item['mata_kuliah'] }}</small>
                        </div>
                        <span class="status-badge {{ $item['status_class'] }}">{{ $item['status'] }}</span>
                        <small class="deadline-date">Deadline {{ $item['deadline_format'] }}</small>
                    </article>
                @empty
                    <p class="success-note">Semua tugas sudah selesai. Bagus!</p>
                @endforelse

                <a href="{{ route('pengelolaan', ['username' => $username, 'hari' => 'Senin']) }}#daftar-tugas" class="text-link">Buka daftar tugas →</a>
            </div>
        </aside>
    </section>
</div>
@endsection
