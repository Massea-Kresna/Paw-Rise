<nav class="pr-navbar">
    <div class="container d-flex align-items-center justify-content-between">

        {{-- Brand / Logo --}}
        <a href="{{ route('home') }}" class="pr-brand">
            {{-- Proper paw print SVG --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 100 100" fill="var(--pr-orange)">
                <ellipse cx="25" cy="18" rx="11" ry="14"/>
                <ellipse cx="50" cy="11" rx="11" ry="14"/>
                <ellipse cx="75" cy="18" rx="11" ry="14"/>
                <ellipse cx="13" cy="44" rx="9" ry="12"/>
                <ellipse cx="87" cy="44" rx="9" ry="12"/>
                <path d="M50 34 C33 34 20 45 20 58 C20 70 30 80 50 80 C70 80 80 70 80 58 C80 45 67 34 50 34Z"/>
            </svg>
            <span>PawRise</span>
        </a>

        {{-- Nav Links (center) --}}
        <div class="d-none d-md-flex align-items-center pr-nav-links">
            @guest
                <a href="{{ route('catalog.index') }}" class="pr-nav-link {{ request()->routeIs('catalog.*') ? 'active' : '' }}">Katalog</a>
            @endguest
            <a href="{{ route('about') }}" class="pr-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ route('education') }}" class="pr-nav-link {{ request()->routeIs('education') ? 'active' : '' }}">Edukasi</a>
            <a href="{{ route('help') }}" class="pr-nav-link {{ request()->routeIs('help') ? 'active' : '' }}">Bantuan</a>
        </div>

        {{-- Right side: Auth buttons --}}
        <div class="d-flex align-items-center gap-2">
            @auth
                {{-- Logged-in: Masuk + Daftar orange pill dropdown --}}
                <a href="{{ route('user.profile') }}" class="pr-nav-btn-outline">Masuk</a>
                <div class="dropdown">
                    <a class="pr-nav-btn-primary d-inline-flex align-items-center gap-2"
                       data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        Daftar
                        <i class="bi bi-chevron-down" style="font-size:.7rem;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2">
                        @if(auth()->user()->isShelter())
                            <li><a class="dropdown-item py-2" href="{{ route('shelter.dashboard') }}">
                                <i class="bi bi-grid me-2 text-muted"></i>Dashboard</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('shelter.animals.index') }}">
                                <i class="bi bi-clipboard-check me-2 text-muted"></i>Kelola Hewan</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('shelter.applications.index') }}">
                                <i class="bi bi-file-earmark-text me-2 text-muted"></i>Permohonan</a></li>
                        @else
                            <li><a class="dropdown-item py-2" href="{{ route('user.profile') }}">
                                <i class="bi bi-person me-2 text-muted"></i>Profil Saya</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('user.applications') }}">
                                <i class="bi bi-clipboard-check me-2 text-muted"></i>Status Adopsi</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('user.favorites') }}">
                                <i class="bi bi-heart me-2 text-muted"></i>Hewan Disukai</a></li>
                        @endif
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><a class="dropdown-item py-2 text-danger" href="{{ route('logout.show') }}">
                            <i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
                    </ul>
                </div>
            @else
                {{-- Guest: Masuk (outline) + Daftar (orange pill) --}}
                <a href="{{ route('login') }}" class="pr-nav-btn-outline">Masuk</a>
                <a href="{{ route('register') }}" class="pr-nav-btn-primary">Daftar</a>
            @endauth
        </div>


    </div>
</nav>
