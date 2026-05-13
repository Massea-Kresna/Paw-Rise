<div class="pr-sidebar">
    <div class="pr-side-profile">
        <img src="{{ auth()->user()->profilePhotoUrl() }}" alt="">
        <div>
            <h6>{{ auth()->user()->name }}</h6>
            <small>Admin Sistem</small>
        </div>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                <i class="bi bi-people"></i> Kelola Pengguna
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.shelters.*') ? 'active' : '' }}" href="{{ route('admin.shelters.index') }}">
                <i class="bi bi-shop"></i> Verifikasi Shelter
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.edukasi.*') ? 'active' : '' }}" href="{{ route('admin.edukasi.index') }}">
                <i class="bi bi-journal-richtext"></i> Konten Edukasi
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('logout.show') ? 'active' : '' }}" href="{{ route('logout.show') }}" style="color: var(--pr-orange-dark)">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </a>
        </li>
    </ul>
</div>
