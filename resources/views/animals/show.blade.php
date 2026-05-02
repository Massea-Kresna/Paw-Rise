@extends('layouts.guest')
@section('title', $animal->name . ' - PawRise')
@section('content')
<div class="container py-5">
    <nav class="mb-4 small">
        <a href="{{ route('home') }}" class="text-decoration-none text-secondary">Beranda</a> /
        <a href="{{ route('catalog.index') }}" class="text-decoration-none text-secondary">Katalog</a> /
        <span>{{ $animal->name }}</span>
    </nav>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="pr-card overflow-hidden">
                <img src="{{ $animal->mainPhotoUrl() }}" alt="{{ $animal->name }}" class="w-100" style="height: 480px; object-fit: cover;">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <span class="pr-badge mb-2">{{ ucfirst($animal->species) }}</span>
                    <h1 class="fw-bold mb-1">{{ $animal->name }}</h1>
                    <p class="text-secondary mb-0"><i class="bi bi-geo-alt"></i> {{ $animal->shelter->shelter_name ?? '—' }}, {{ $animal->shelter->city ?? '' }}</p>
                </div>
                @auth
                    @if(auth()->user()->isAdopter())
                        <form method="POST" action="{{ route('favorites.toggle', $animal) }}">@csrf
                            <button class="btn btn-outline-warning"><i class="bi bi-heart{{ auth()->user()->favorites()->where('animal_id', $animal->id)->exists() ? '-fill' : '' }}"></i></button>
                        </form>
                    @endif
                @endauth
            </div>
            <div class="row mt-4 g-3">
                <div class="col-6 col-md-3"><div class="pr-stat"><small>Usia</small><strong>{{ $animal->ageLabel() }}</strong></div></div>
                <div class="col-6 col-md-3"><div class="pr-stat"><small>Jenis Kelamin</small><strong>{{ ucfirst($animal->gender) }}</strong></div></div>
                <div class="col-6 col-md-3"><div class="pr-stat"><small>Ukuran</small><strong>{{ ucfirst($animal->size) }}</strong></div></div>
                <div class="col-6 col-md-3"><div class="pr-stat"><small>Berat</small><strong>{{ $animal->weight_kg ?? '-' }} kg</strong></div></div>
            </div>

            <h5 class="fw-bold mt-4">Tentang {{ $animal->name }}</h5>
            <p class="text-secondary">{{ $animal->description ?? 'Belum ada deskripsi.' }}</p>

            @if($animal->characteristics)
                <h6 class="fw-bold">Karakteristik</h6>
                <p class="text-secondary">{{ $animal->characteristics }}</p>
            @endif

            <div class="d-flex gap-2 flex-wrap mb-3">
                @if($animal->vaccinated) <span class="badge bg-success">Sudah Vaksin</span> @endif
                @if($animal->sterilized) <span class="badge bg-success">Sudah Steril</span> @endif
                <span class="badge" style="background: var(--pr-orange);">Status: {{ ucfirst($animal->status) }}</span>
            </div>

            @if($animal->status === 'tersedia')
                @auth
                    @if(auth()->user()->isAdopter())
                        <a href="{{ route('adoption.create', $animal) }}" class="btn pr-btn-primary btn-lg w-100">Ajukan Adopsi</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn pr-btn-primary btn-lg w-100">Masuk untuk Mengadopsi</a>
                @endauth
            @else
                <button class="btn btn-secondary btn-lg w-100" disabled>Tidak Tersedia</button>
            @endif
        </div>
    </div>

    @if($animal->medical_history)
        <div class="pr-card p-4 mt-5">
            <h5 class="fw-bold">Riwayat Medis</h5>
            <p class="text-secondary mb-0">{{ $animal->medical_history }}</p>
        </div>
    @endif

    @if($similar->count())
        <h3 class="fw-bold mt-5 mb-3">Hewan Serupa</h3>
        <div class="row g-4">
            @foreach($similar as $a)
                <div class="col-md-6 col-lg-3">@include('partials.animal-card', ['animal' => $a])</div>
            @endforeach
        </div>
    @endif
</div>
@endsection
