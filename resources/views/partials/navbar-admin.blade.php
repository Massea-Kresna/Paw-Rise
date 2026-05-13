<nav class="pr-navbar">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="pr-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="var(--pr-orange)" viewBox="0 0 24 24">
                <path d="M12 2C9.5 2 7.5 4 7.5 6.5S9.5 11 12 11s4.5-2 4.5-4.5S14.5 2 12 2zM6 6C4.3 6 3 7.3 3 9s1.3 3 3 3 3-1.3 3-3S7.7 6 6 6zm12 0c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zM4.5 13C2.6 13 1 14.6 1 16.5S2.6 20 4.5 20 8 18.4 8 16.5 6.4 13 4.5 13zm15 0C17.6 13 16 14.6 16 16.5S17.6 20 19.5 20 23 18.4 23 16.5 21.4 13 19.5 13zM12 13c-2.8 0-5 2.2-5 5v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1c0-2.8-2.2-5-5-5z" />
            </svg>
            PawRise <span style="font-weight:500; font-size:.85rem; color:var(--pr-text-muted); margin-left:4px;">Admin</span>
        </a>

        <div class="d-flex align-items-center gap-3">
            <a href="#" class="text-dark"><i class="bi bi-bell" style="font-size:1.2rem"></i></a>
            <span class="text-muted">|</span>
            <div class="dropdown">
                <a class="d-inline-flex align-items-center gap-2 text-decoration-none text-dark" data-bs-toggle="dropdown" href="#" role="button">
                    <img src="{{ auth()->user()->profilePhotoUrl() }}" alt="" width="32" height="32" class="rounded-circle border" style="border-color: var(--pr-orange) !important;">
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid me-2"></i>Dashboard</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger" href="{{ route('logout.show') }}"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
