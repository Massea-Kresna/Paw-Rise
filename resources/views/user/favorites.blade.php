@extends('layouts.user')
@section('title', 'Hewan Disukai - PawRise')
@section('content')

<h3 class="fw-bold mb-1" style="font-family:'Manrope',sans-serif;">Hewan Disukai</h3>
<p class="pr-muted mb-4">Daftar teman berbulu yang menanti rumah darimu.</p>

@if($animals->count())
    <div class="row g-3">
        @foreach($animals as $animal)
            <div class="col-md-6 col-xl-6">
                @include('partials.animal-card', ['animal' => $animal])
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    @if($animals->hasPages())
        <nav class="pr-pagination mt-5" aria-label="Pagination">
            <ul>
                <li class="{{ $animals->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $animals->previousPageUrl() ?? '#' }}"><i class="bi bi-chevron-left"></i></a>
                </li>
                @for($i = 1; $i <= $animals->lastPage(); $i++)
                    <li class="{{ $animals->currentPage() === $i ? 'active' : '' }}">
                        <a href="{{ $animals->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="{{ ! $animals->hasMorePages() ? 'disabled' : '' }}">
                    <a href="{{ $animals->nextPageUrl() ?? '#' }}"><i class="bi bi-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
    @endif
@else
    <div class="pr-card p-5 text-center">
        <i class="bi bi-heart" style="font-size: 60px; color: var(--pr-orange-light)"></i>
        <p class="text-secondary mt-3">Belum ada hewan favorit.</p>
        <a href="{{ route('catalog.index') }}" class="btn pr-btn-primary mt-2">Cari Hewan</a>
    </div>
@endif

@endsection