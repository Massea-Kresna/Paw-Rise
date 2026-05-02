@extends('layouts.user')
@section('title', 'Status Adopsi - PawRise')
@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-3">@include('partials.sidebar-user')</div>
        <div class="col-lg-9">
            <h3 class="fw-bold mb-4">Status Adopsi Saya</h3>
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

            @if($apps->count())
                <div class="d-grid gap-3">
                    @foreach($apps as $app)
                        <div class="pr-card p-3 d-flex align-items-center gap-3 flex-wrap">
                            <img src="{{ $app->animal->mainPhotoUrl() }}" alt="" style="width:96px; height:96px; object-fit:cover; border-radius: 12px;">
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-1">{{ $app->animal->name }}</h6>
                                <p class="text-secondary small mb-1"><i class="bi bi-geo-alt"></i> {{ $app->animal->shelter->shelter_name ?? '' }}</p>
                                <small class="text-secondary">Diajukan {{ $app->created_at->format('d M Y') }}</small>
                            </div>
                            <div>
                                @php
                                    $color = ['menunggu'=>'warning','disetujui'=>'success','ditolak'=>'danger'][$app->status] ?? 'secondary';
                                @endphp
                                <span class="badge bg-{{ $color }} fs-6 p-2">{{ ucfirst($app->status) }}</span>
                            </div>
                            <a href="{{ route('animals.show', $app->animal) }}" class="btn btn-sm pr-btn-outline">Lihat</a>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">{{ $apps->links() }}</div>
            @else
                <div class="pr-card p-5 text-center">
                    <i class="bi bi-clipboard-check" style="font-size: 60px; color: var(--pr-orange-light)"></i>
                    <p class="text-secondary mt-3">Belum ada permohonan adopsi.</p>
                    <a href="{{ route('catalog.index') }}" class="btn pr-btn-primary mt-2">Lihat Hewan</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
