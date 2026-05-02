<nav class="pr-navbar">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="pr-brand"><i class="bi bi-suit-heart-fill"></i> PawRise</a>

        <div class="d-none d-md-flex align-items-center">
            <a href="{{ route('catalog.index') }}" class="nav-link {{ request()->routeIs('catalog.*') ? 'active' : '' }}">Katalog</a>
            <a href="{{ route('education') }}" class="nav-link {{ request()->routeIs('education') ? 'active' : '' }}">Edukasi</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ route('help') }}" class="nav-link {{ request()->routeIs('help') ? 'active' : '' }}">Bantuan</a>
        </div>

        <div class="d-flex align-items-center gap-2">
            @auth
                <span class="text-muted d-none d-md-inline">|</span>
                <div class="dropdown">
                    <a class="d-inline-flex align-items-center gap-2 text-decoration-none text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <img src="{{ auth()->user()->profilePhotoUrl() }}" alt="" width="32" height="32" class="rounded-circle border" style="border-color: var(--pr-orange) !important;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        @if(auth()->user()->isShelter())
                            <li><a class="dropdown-item" href="{{ route('shelter.dashboard') }}"><i class="bi bi-grid me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('shelter.animals.index') }}"><i class="bi bi-clipboard-check me-2"></i>Kelola Hewan</a></li>
                            <li><a class="dropdown-item" href="{{ route('shelter.applications.index') }}"><i class="bi bi-file-earmark-text me-2"></i>Permohonan</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="bi bi-person me-2"></i>Profil Saya</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.applications') }}"><i class="bi bi-clipboard-check me-2"></i>Status Adopsi</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.favorites') }}"><i class="bi bi-heart me-2"></i>Hewan Disukai</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('logout.show') }}"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-pr-pill">Daftar</a>
            @endauth
        </div>
    </div>
</nav>
