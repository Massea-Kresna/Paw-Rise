@php
    $isFav = false;
    if (auth()->check()) {
        $isFav = auth()->user()->favorites()->where('animal_id', $animal->id)->exists();
    }
@endphp

<div class="pr-cat-card h-100" data-testid="card-animal-{{ $animal->id }}">

    {{-- Foto --}}
    <div class="pr-cat-card-img">
        <img src="{{ $animal->mainPhotoUrl() }}" alt="{{ $animal->name }}" loading="lazy">

        @auth
            <form method="POST" action="{{ route('favorites.toggle', $animal) }}" class="m-0 p-0">
                @csrf
                <button type="submit"
                        class="pr-cat-fav {{ $isFav ? 'active' : '' }}"
                        title="Favorit"
                        data-testid="button-favorite-{{ $animal->id }}">
                    <i class="bi {{ $isFav ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
               class="pr-cat-fav"
               title="Login untuk favorit"
               data-testid="link-favorite-login-{{ $animal->id }}">
                <i class="bi bi-heart"></i>
            </a>
        @endauth
    </div>

    {{-- Body --}}
    <div class="pr-cat-card-body">
        <div class="d-flex justify-content-between align-items-start mb-1">
            <h6 class="pr-cat-card-name m-0" data-testid="text-animal-name-{{ $animal->id }}">
                {{ $animal->name }}
            </h6>
            <small class="pr-muted flex-shrink-0 ms-2" data-testid="text-animal-age-{{ $animal->id }}">
                {{ $animal->ageLabel() }}
            </small>
        </div>

        <div class="pr-muted small mb-2" data-testid="text-animal-breed-{{ $animal->id }}">
            {{ $animal->breed }}
        </div>

        <div class="pr-muted small mb-3" data-testid="text-animal-location-{{ $animal->id }}">
            <i class="bi bi-geo-alt"></i>
            {{ $animal->shelter->shelter_name ?? '' }}@if($animal->shelter?->city), {{ $animal->shelter->city }}@endif
        </div>

        <a href="{{ route('animals.show', $animal) }}"
           class="btn pr-btn-outline w-100 btn-sm mt-auto"
           style="border-radius: 10px;"
           data-testid="link-detail-{{ $animal->id }}">
            Lihat Detail
        </a>
    </div>
</div>