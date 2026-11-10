@extends('layouts.app')

@section('title', 'Jadwal & Tugas')

@section('content')
<div class="page-stack">
    @include('partials.page-heading', ['title' => 'Jadwal & Tugas MataKuliah'])

    <section class="panel">
        <div class="section-heading">
            <h2>Agenda perkuliahan</h2>
        </div>

        <nav class="day-navigation" aria-label="Pilih hari">
            @foreach ($daftarHari as $hariItem)
                <a href="{{ route('pengelolaan', ['username' => $username, 'hari' => $hariItem]) }}"
                   class="day-link {{ $hari === $hariItem ? 'is-selected' : '' }}"
                   @if ($hari === $hariItem) aria-current="date" @endif>
                    {{ $hariItem }}
                </a>
            @endforeach
        </nav>

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
                    <strong>Tidak ada jadwal pada hari {{ $hari }}</strong>
                </div>
            @endforelse
        </div>
    </section>

    <section class="management-layout" id="daftar-tugas">
        <div class="panel task-column">
            <div class="section-heading">
                <h2>Daftar tugas</h2>
                <span class="task-count">{{ count($tugas) }}</span>
            </div>

            <div class="task-list">
                @foreach ($tugas as $item)
                    <article class="task-card">
                        <div class="task-information">
                            <div class="task-title-row">
                                <h3>{{ $item['nama'] }}</h3>
                                <span class="status-badge {{ $item['status_class'] }}">{{ $item['status'] }}</span>
                            </div>
                            <p class="task-course">{{ $item['mata_kuliah'] }}</p>
                            <p class="task-description">{{ $item['deskripsi'] }}</p>
                        </div>
                        <div class="task-deadline">
                            <small>Deadline</small>
                            <strong>{{ $item['deadline_format'] }}</strong>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <aside class="task-summary">
            <article class="stat-card">
                <p>Tugas belum selesai</p>
                <strong>{{ $jumlahTugasAktif }}</strong>
            </article>
            <article class="stat-card">
                <p>Tugas selesai</p>
                <strong>{{ $jumlahTugasSelesai }}</strong>
            </article>
        </aside>
    </section>
</div>
@endsection
