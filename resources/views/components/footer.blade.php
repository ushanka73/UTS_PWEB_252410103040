@props(['username' => 'Mahasiswa'])

<footer class="site-footer">
    <nav class="bottom-nav" aria-label="Navigasi halaman">
        <a href="{{ route('dashboard', ['username' => $username]) }}"
           class="nav-button {{ request()->routeIs('dashboard') ? 'is-active' : '' }}"
           @if (request()->routeIs('dashboard')) aria-current="page" @endif>
            Dashboard
        </a>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}#daftar-tugas"
           class="nav-button {{ request()->routeIs('pengelolaan') ? 'is-active' : '' }}"
           @if (request()->routeIs('pengelolaan')) aria-current="page" @endif>
            Tugas
        </a>
    </nav>

    <div class="footer-bar">
        <strong>OurKelas.</strong>
        <p>by Hayden Putra Pradana Mulyadi - 252410103040.</p>
    </div>
</footer>
