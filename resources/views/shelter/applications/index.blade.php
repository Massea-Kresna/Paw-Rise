@extends('layouts.shelter')
@section('title', 'Permohonan - PawRise Shelter')
@section('content')

<style>
/* Tab filter */
.app-tabs {
    display: flex;
    gap: 4px;
    border-bottom: 1.5px solid var(--pr-border);
    margin-bottom: 24px;
    align-items: center;
}
.app-tab {
    padding: 9px 20px;
    border-radius: 10px 10px 0 0;
    font-size: .88rem;
    font-weight: 600;
    color: var(--pr-text-muted);
    text-decoration: none;
    border: none;
    background: none;
    cursor: pointer;
    transition: all .15s;
    white-space: nowrap;
}
.app-tab.active {
    background: var(--pr-orange-light);
    color: var(--pr-orange);
    border-bottom: 2px solid var(--pr-orange);
}
.app-tab:hover:not(.active) { color: var(--pr-orange); }
.app-tab-filter {
    margin-left: auto;
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: .83rem;
    color: var(--pr-text-muted);
    font-weight: 600;
    cursor: pointer;
    padding: 6px 12px;
    border-radius: 8px;
    border: 1.5px solid var(--pr-border);
    background: #fff;
    text-decoration: none;
}
.app-tab-filter:hover { border-color: var(--pr-orange); color: var(--pr-orange); }

/* Table */
.app-table th {
    font-size: .72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .07em;
    color: var(--pr-text-muted);
    padding: 12px 20px;
    border-bottom: 1.5px solid var(--pr-border);
    background: #fff;
}
.app-table td {
    padding: 16px 20px;
    border-bottom: 1px solid var(--pr-border);
    vertical-align: middle;
}
.app-table tbody tr:last-child td { border-bottom: none; }
.app-table tbody tr:hover { background: var(--pr-bg); }

/* Avatar huruf */
.user-avatar {
    width: 38px; height: 38px;
    border-radius: 50%;
    background: var(--pr-orange-light);
    color: var(--pr-orange);
    font-weight: 800;
    font-size: .85rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

/* Tombol Lihat Detail */
.btn-detail {
    background: var(--pr-orange);
    color: #fff;
    font-weight: 700;
    font-size: .82rem;
    padding: 8px 20px;
    border-radius: 999px;
    border: none;
    text-decoration: none;
    transition: background .15s;
    white-space: nowrap;
}
.btn-detail:hover { background: var(--pr-orange-dark); color: #fff; }

/* Pagination */
.paw-pagination {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 6px;
    margin-top: 20px;
}
.paw-page-btn {
    padding: 6px 14px;
    border-radius: 8px;
    border: 1.5px solid var(--pr-border);
    background: #fff;
    font-size: .84rem;
    font-weight: 600;
    color: var(--pr-text);
    cursor: pointer;
    text-decoration: none;
    transition: all .15s;
}
.paw-page-btn.active { background: var(--pr-orange); color: #fff; border-color: var(--pr-orange); }
.paw-page-btn:hover:not(.active) { border-color: var(--pr-orange); color: var(--pr-orange); }
.paw-page-btn.disabled { opacity: .4; pointer-events: none; }
</style>

{{-- Header --}}
<div class="mb-4">
    <h3 class="fw-bold mb-1">Permohonan Adopsi</h3>
    <p class="mb-0" style="color: var(--pr-text-muted); font-size: .9rem;">
        Kelola dan tinjau pengajuan adopsi dari calon orang tua asuh
    </p>
</div>

@if(session('success'))
    <div class="alert alert-success mb-3">{{ session('success') }}</div>
@endif

{{-- Hitung per status --}}
@php
    $shelter   = auth()->user()->shelter;
    $totalAll  = \App\Models\AdoptionApplication::whereHas('animal', fn($q) => $q->where('shelter_id', $shelter->id))->count();
    $totalMenunggu  = \App\Models\AdoptionApplication::whereHas('animal', fn($q) => $q->where('shelter_id', $shelter->id))->where('status','menunggu')->count();
    $totalDisetujui = \App\Models\AdoptionApplication::whereHas('animal', fn($q) => $q->where('shelter_id', $shelter->id))->where('status','disetujui')->count();
    $totalDitolak   = \App\Models\AdoptionApplication::whereHas('animal', fn($q) => $q->where('shelter_id', $shelter->id))->where('status','ditolak')->count();
    $activeStatus   = request('status', '');
@endphp

{{-- Tab Filter --}}
<div class="app-tabs">
    <a href="{{ request()->fullUrlWithQuery(['status' => '']) }}"
       class="app-tab {{ $activeStatus === '' ? 'active' : '' }}">
        Semua ({{ $totalAll }})
    </a>
    <a href="{{ request()->fullUrlWithQuery(['status' => 'menunggu']) }}"
       class="app-tab {{ $activeStatus === 'menunggu' ? 'active' : '' }}">
        Menunggu ({{ $totalMenunggu }})
    </a>
    <a href="{{ request()->fullUrlWithQuery(['status' => 'disetujui']) }}"
       class="app-tab {{ $activeStatus === 'disetujui' ? 'active' : '' }}">
        Disetujui
    </a>
    @if($totalDitolak > 0)
    <a href="{{ request()->fullUrlWithQuery(['status' => 'ditolak']) }}"
       class="app-tab {{ $activeStatus === 'ditolak' ? 'active' : '' }}">
        Ditolak
    </a>
    @endif

    {{-- Filter icon kanan --}}
    <a href="#" class="app-tab-filter">
        <i class="bi bi-sliders"></i> Filter
    </a>
</div>

{{-- Tabel --}}
<div class="pr-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table app-table mb-0">
            <thead>
                <tr>
                    <th>Nama Pengadopsi</th>
                    <th>Hewan yang Diajukan</th>
                    <th>Tanggal</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($apps as $i => $app)
                <tr>
                    {{-- Avatar + Nama --}}
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="user-avatar">
                                {{ strtoupper(substr($app->full_name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-semibold" style="font-size: .9rem;">{{ $app->full_name }}</div>
                                <div style="font-size: .78rem; color: var(--pr-text-muted);">{{ $app->user->email ?? $app->whatsapp }}</div>
                            </div>
                        </div>
                    </td>

                    {{-- Foto + Nama Hewan --}}
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ $app->animal->mainPhotoUrl() }}" alt=""
                                 style="width:42px; height:42px; border-radius:10px; object-fit:cover; flex-shrink:0;">
                            <div>
                                <div class="fw-semibold" style="font-size: .9rem;">{{ $app->animal->name }}</div>
                                <div style="font-size: .78rem; color: var(--pr-text-muted);">
                                    {{ ucfirst($app->animal->species) }} • {{ ucfirst($app->animal->gender) }}
                                </div>
                            </div>
                        </div>
                    </td>

                    {{-- Tanggal --}}
                    <td style="font-size: .86rem; color: var(--pr-text-muted);">
                        {{ $app->created_at->format('d M Y') }}<br>
                        <small>{{ $app->created_at->format('H:i') }} WIB</small>
                    </td>

                    {{-- Aksi --}}
                    <td class="text-end">
                        <a href="{{ route('shelter.applications.show', $app) }}" class="btn-detail">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-5" style="color: var(--pr-text-muted);">
                        <i class="bi bi-clipboard-x" style="font-size: 2.5rem; display:block; margin-bottom:10px; opacity:.4;"></i>
                        Belum ada permohonan.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination — selalu tampil --}}
<div class="paw-pagination">
    {{-- Prev --}}
    @if($apps->onFirstPage())
        <span class="paw-page-btn disabled">Prev</span>
    @else
        <a href="{{ $apps->previousPageUrl() }}" class="paw-page-btn">Prev</a>
    @endif

    {{-- Nomor halaman --}}
    @for($page = 1; $page <= $apps->lastPage(); $page++)
        <a href="{{ $apps->url($page) }}"
           class="paw-page-btn {{ $page == $apps->currentPage() ? 'active' : '' }}">
            {{ $page }}
        </a>
    @endfor

    {{-- Next --}}
    @if($apps->hasMorePages())
        <a href="{{ $apps->nextPageUrl() }}" class="paw-page-btn">Next</a>
    @else
        <span class="paw-page-btn disabled">Next</span>
    @endif
</div>

@endsection