@props(['username' => 'Mahasiswa'])

<header class="topbar">
    <a href="{{ route('dashboard', ['username' => $username]) }}" class="brand">OurKelas</a>

    <a href="{{ route('profile', ['username' => $username]) }}" class="profile-link" aria-label="Profil {{ $username }}">
        <img src="/images/profile-avatar.png" alt="Foto profil {{ $username }}" class="profile-avatar" width="42" height="42" loading="eager" decoding="async">
        <span class="profile-meta">
            <strong>{{ $username }}</strong>
            <small>Profil</small>
        </span>
    </a>
</header>
