@extends('layouts.user')
@section('title', 'Hewan Disukai - PawRise')
@section('content')

<h3 class="fw-bold mb-4">Hewan Disukai</h3>

@if($animals->count())
    <div class="row g-3">
        @foreach($animals as $animal)
            <div class="col-md-6 col-xl-4">
                @include('partials.animal-card', ['animal' => $animal])
            </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $animals->links() }}</div>
@else
    <div class="pr-card p-5 text-center">
        <i class="bi bi-heart" style="font-size: 60px; color: var(--pr-orange-light)"></i>
        <p class="text-secondary mt-3">Belum ada hewan favorit.</p>
        <a href="{{ route('catalog.index') }}" class="btn pr-btn-primary mt-2">Cari Hewan</a>
    </div>
@endif

@endsection