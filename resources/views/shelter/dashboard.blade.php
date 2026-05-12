@extends('layouts.shelter')
@section('title', 'Dashboard - PawRise Shelter')
@section('content')

<style>
.dash-stat {
    background: #fff;
    border: 1px solid var(--pr-border);
    border-radius: 16px;
    padding: 20px 24px;
}
.dash-stat-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    margin-bottom: 10px;
}
.dash-stat-num {
    font-size: 2.5rem;
    font-weight: 800;
    line-height: 1;
    margin-bottom: 4px;
}
.dash-stat-label {
    font-size: .78rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .06em;
    color: var(--pr-text-muted);
}
.app-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid var(--pr-border);
}
.app-row:last-child { border-bottom: none; }
.app-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--pr-orange-light);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: .9rem;
    color: var(--pr-orange);
    flex-shrink: 0;
}
.animal-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid var(--pr-border);
}
.animal-row:last-child { border-bottom: none; }
.status-pill {
    padding: 3px 10px;
    border-radius: 999px;
    font-size: .75rem;
    font-weight: 700;
    white-space: nowrap;
}
.pill-tersedia  { background: #D1FAE5; color: #065F46; }
.pill-diproses  { background: #DBEAFE; color: #1E40AF; }
.pill-diadopsi  { background: #F3F4F6; color: #6B7280; }
.pill-menunggu  { background: #FEF3C7; color: #92400E; }
.pill-disetujui { background: #D1FAE5; color: #065F46; }
.pill-ditolak   { background: #FEE2E2; color: #991B1B; }
.performa-card {
    background: #fff;
    border: 1px solid var(--pr-border);
    border-radius: 16px;
    padding: 20px 24px;
    display: flex;
    align-items: center;
    gap: 24px;
    flex-wrap: wrap;
}
</style>

@php
    $shelter      = auth()->user()->shelter;
    $totalAnimals = $shelter ? $shelter->animals()->count() : 0;
    $available    = $shelter ? $shelter->animals()->where('status','tersedia')->count() : 0;
    $process      = $shelter ? $shelter->animals()->where('status','diproses')->count() : 0;
    $adopted      = $shelter ? $shelter->animals()->where('status','diadopsi')->count() : 0;
@endphp

{{-- Header --}}
<div class="d-flex align-items-start justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h3 class="fw-bold mb-1">Selamat datang, {{ $shelter->shelter_name ?? auth()->user()->name }}</h3>
        <p class="mb-0" style="color: var(--pr-text-muted); font-size: .9rem;">
            Berikut adalah ringkasan aktivitas shelter Anda.
        </p>
    </div>
    <a href="{{ route('shelter.animals.create') }}"
       class="btn pr-btn-primary d-inline-flex align-items-center gap-2"
       style="border-radius: 12px; padding: 10px 20px;">
        <i class="bi bi-plus-lg"></i> Tambah Hewan Baru
    </a>
</div>

{{-- Stat Cards --}}
<div class="row g-3 mb-4">
    {{-- Total Hewan --}}
    <div class="col-md-4">
        <div class="dash-stat text-center">
            <div class="dash-stat-icon" style="background: #FEF3C7; margin: 0 auto 12px;">
                <i class="bi bi-paw-fill" style="color: var(--pr-orange);"></i>
            </div>
            <div class="dash-stat-label">TOTAL HEWAN</div>
            <div class="dash-stat-num" style="color: var(--pr-text);">{{ $totalAnimals }}</div>
            <div style="font-size:.82rem; color: #16A34A; font-weight: 600; margin-top:4px;">
                <i class="bi bi-graph-up-arrow"></i> +{{ $available }} masih tersedia
            </div>
        </div>
    </div>

    {{-- Menunggu Adopsi --}}
    <div class="col-md-4">
        <div class="dash-stat text-center">
            <div class="dash-stat-icon" style="background: #DBEAFE; margin: 0 auto 12px;">
                <i class="bi bi-heart-fill" style="color: #3B82F6;"></i>
            </div>
            <div class="dash-stat-label">MENUNGGU ADOPSI</div>
            <div class="dash-stat-num" style="color: var(--pr-text);">{{ $menungguCount }}</div>
            <div style="font-size:.82rem; color: var(--pr-text-muted); margin-top:4px;">
                {{ $menungguCount }} hewan siap adopsi baru
            </div>
        </div>
    </div>

    {{-- Permohonan Baru --}}
    <div class="col-md-4">
        <div class="dash-stat text-center" style="border: 2px solid var(--pr-orange);">
            <div class="dash-stat-icon" style="background: var(--pr-orange); margin: 0 auto 12px;">
                <i class="bi bi-clipboard-fill" style="color:#fff;"></i>
            </div>
            <div class="dash-stat-label">PERMOHONAN BARU</div>
            <div class="dash-stat-num" style="color: var(--pr-text);">{{ $newApps }}</div>
            <div style="font-size:.82rem; color: var(--pr-orange); font-weight: 700; margin-top:4px;">
                Butuh respon segera
            </div>
        </div>
    </div>
</div>

{{-- Permohonan + Hewan --}}
<div class="row g-3 mb-4">

    {{-- Permohonan Terbaru --}}
    <div class="col-lg-6">
        <div class="pr-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0">Permohonan Adopsi Terbaru</h6>
                <a href="{{ route('shelter.applications.index') }}"
                   style="font-size:.83rem; color:var(--pr-orange); font-weight:600; text-decoration:none;">
                    Lihat Semua
                </a>
            </div>

            @forelse($recentApps as $app)
            <div class="app-row">
                {{-- Avatar foto bulat dengan inisial --}}
                <div class="app-avatar" style="background: var(--pr-orange-light); color: var(--pr-orange); font-size:.85rem; font-weight:800;">
                    {{ strtoupper(substr($app->full_name, 0, 1)) }}
                </div>
                <div class="flex-grow-1" style="min-width:0;">
                    <div class="fw-semibold" style="font-size:.88rem;">{{ $app->full_name }}</div>
                    <div style="font-size:.75rem; color:var(--pr-text-muted);">
                        Mengajukan adopsi untuk
                        <span style="color:var(--pr-text); font-weight:600;">"{{ $app->animal->name }}"</span>
                        ({{ ucfirst($app->animal->species) }})
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                    <span class="status-pill pill-{{ $app->status }}">{{ ucfirst($app->status) }}</span>
                    <a href="{{ route('shelter.applications.show', $app) }}"
                       style="width:28px;height:28px;border-radius:8px;border:1px solid var(--pr-border);
                              display:flex;align-items:center;justify-content:center;
                              color:var(--pr-text-muted);text-decoration:none;font-size:.8rem;">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>
            @empty
            <p class="text-center py-3 mb-0" style="color:var(--pr-text-muted); font-size:.9rem;">
                Belum ada permohonan.
            </p>
            @endforelse
        </div>
    </div>

    {{-- Manajemen Hewan --}}
    <div class="col-lg-6">
        <div class="pr-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0">Manajemen Hewan</h6>
                <a href="{{ route('shelter.animals.index') }}"
                   style="font-size:.83rem; color:var(--pr-text-muted); text-decoration:none;">
                    <i class="bi bi-three-dots"></i>
                </a>
            </div>

            @forelse($animals as $animal)
            <div class="animal-row">
                <img src="{{ $animal->mainPhotoUrl() }}" alt=""
                     style="width:42px;height:42px;border-radius:50%;object-fit:cover;flex-shrink:0;border:2px solid var(--pr-border);">
                <div class="flex-grow-1" style="min-width:0;">
                    <div class="fw-semibold" style="font-size:.88rem;">{{ $animal->name }}</div>
                    <div style="font-size:.75rem; color:var(--pr-text-muted);">
                        {{ $animal->breed }} • {{ $animal->ageLabel() }}
                    </div>
                </div>
                <span class="status-pill pill-{{ $animal->status }}">{{ ucfirst($animal->status) }}</span>
            </div>
            @empty
            <p class="text-center py-3 mb-0" style="color:var(--pr-text-muted); font-size:.9rem;">
                Belum ada hewan terdaftar.
            </p>
            @endforelse

            <a href="{{ route('shelter.animals.index') }}"
               class="btn w-100 mt-3"
               style="border-radius:10px;border:1px solid var(--pr-border);font-size:.85rem;
                      color:var(--pr-text-muted);font-weight:600;padding:8px;">
                Kelola Database Hewan
            </a>
        </div>
    </div>
</div>

{{-- Performa bulan ini --}}
@php
    $adoptedCount = $shelter ? $shelter->animals()->where('status','diadopsi')->count() : 0;
@endphp
<div class="performa-card" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
    <div style="width:44px;height:44px;border-radius:12px;background:#DBEAFE;
                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <i class="bi bi-graph-up-arrow" style="color:#3B82F6;font-size:1.2rem;"></i>
    </div>
    <div class="flex-grow-1">
        <div class="fw-bold mb-1" style="font-size:.95rem;">Performa Shelter Bulan Ini</div>
        <div style="font-size:.83rem; color:var(--pr-text-muted);">
            Shelter Anda telah menyelesaikan
            <span style="color:#16A34A; font-weight:700;">{{ $adoptedCount }} adopsi</span>
            sukses dalam 30 hari terakhir.
        </div>
    </div>
    <div class="d-flex gap-4 flex-shrink-0">
        <div class="text-center">
            <div style="font-size:.72rem;color:var(--pr-text-muted);font-weight:700;text-transform:uppercase;letter-spacing:.05em;">Respon Rate</div>
            <div class="fw-bold" style="font-size:1.4rem; color:var(--pr-text);">92%</div>
        </div>
        <div class="text-center">
            <div style="font-size:.72rem;color:var(--pr-text-muted);font-weight:700;text-transform:uppercase;letter-spacing:.05em;">Avg Process</div>
            <div class="fw-bold" style="font-size:1.4rem; color:var(--pr-text);">4.5 Hari</div>
        </div>
    </div>
</div>

@endsection