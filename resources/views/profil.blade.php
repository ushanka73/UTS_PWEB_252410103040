@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="page-stack">
    @include('partials.page-heading', ['title' => 'Profil'])

    <section class="profile-panel">
        <aside class="profile-sidebar">
            <div class="profile-person">
                <img
                    src="/images/profile-avatar.png"
                    alt="Foto profil {{ $username }}"
                    class="avatar avatar-large profile-photo"
                    width="82"
                    height="82"
                    loading="eager"
                    decoding="async"
                >
                <div class="profile-header">
                    <h2>{{ $mahasiswa['Nama'] }}</h2>
                    <p class="profile-username">{{ '@' . $mahasiswa['Username'] }}</p>
                    <p>{{ $mahasiswa['Program Studi'] }}</p>
                </div>
            </div>

            <a href="{{ route('logout') }}" class="button button-logout profile-logout">Logout</a>
        </aside>

        <div class="profile-details">
            <div class="section-heading">
                <h2>Informasi mahasiswa</h2>
            </div>
            <div class="profile-grid">
                @foreach ($mahasiswa as $label => $value)
                    <div class="profile-field">
                        <small>{{ $label }}</small>
                        <strong>{{ $value }}</strong>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
