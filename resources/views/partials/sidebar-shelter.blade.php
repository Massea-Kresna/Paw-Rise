@php $shelter = auth()->user()->shelter; @endphp
<div class="pr-sidebar">
    <div class="pr-side-profile">
        <img src="{{ $shelter ? $shelter->logoUrl() : auth()->user()->profilePhotoUrl() }}" alt="">
        <div>
            <h6>{{ $shelter->shelter_name ?? auth()->user()->name }}</h6>
            <small>{{ $shelter->city ?? '' }}</small>
        </div>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('shelter.dashboard') ? 'active' : '' }}" href="{{ route('shelter.dashboard') }}">
                <i class="bi bi-grid"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('shelter.animals.*') ? 'active' : '' }}" href="{{ route('shelter.animals.index') }}">
                <i class="bi bi-clipboard-check"></i> Kelola Hewan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('shelter.applications.*') ? 'active' : '' }}" href="{{ route('shelter.applications.index') }}">
                <i class="bi bi-file-earmark-text"></i> Permohonan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('logout.show') ? 'active' : '' }}" href="{{ route('logout.show') }}" style="color: var(--pr-orange-dark)">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </a>
        </li>
    </ul>
</div>
