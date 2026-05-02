<div class="pr-sidebar">
    <div class="pr-side-profile">
        <img src="{{ auth()->user()->profilePhotoUrl() }}" alt="">
        <div>
            <h6>{{ auth()->user()->name }}</h6>
            <small>Adopter Sejak {{ auth()->user()->created_at->format('Y') }}</small>
        </div>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">
                <i class="bi bi-person"></i> Profil Saya
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.applications') ? 'active' : '' }}" href="{{ route('user.applications') }}">
                <i class="bi bi-clipboard-check"></i> Status Adopsi
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.favorites') ? 'active' : '' }}" href="{{ route('user.favorites') }}">
                <i class="bi bi-heart"></i> Hewan Disukai
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('logout.show') ? 'active' : '' }}" href="{{ route('logout.show') }}" style="color: var(--pr-orange-dark)">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </a>
        </li>
    </ul>
</div>
