@extends('layouts.admin')
@section('title', 'Detail Shelter - PawRise Admin')
@section('content')

<style>
.detail-header {
    display: flex; align-items: center; gap: 20px;
    margin-bottom: 28px; flex-wrap: wrap;
}
.detail-avatar {
    width: 72px; height: 72px; border-radius: 50%;
    object-fit: cover; border: 3px solid var(--pr-orange);
}
.detail-meta { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; }
.meta-box {
    background: var(--pr-bg); border-radius: 12px; padding: 14px 18px;
    border: 1px solid var(--pr-border);
}
.meta-box .lbl { font-size: .72rem; color: var(--pr-text-muted); text-transform: uppercase; letter-spacing: .04em; font-weight: 700; }
.meta-box .val { font-weight: 700; font-size: .95rem; margin-top: 2px; }
.hw-pill {
    padding: 4px 14px; border-radius: 999px; font-size: .75rem; font-weight: 700; display: inline-block;
}
.pill-verified   { background: #D1FAE5; color: #065F46; }
.pill-unverified { background: #FEF3C7; color: #92400E; }
.hw-table th {
    font-size: .72rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .07em; color: var(--pr-text-muted);
    padding: 12px 16px; border-bottom: 1.5px solid var(--pr-border); background: #fff;
}
.hw-table td { padding: 14px 16px; border-bottom: 1px solid var(--pr-border); vertical-align: middle; }
.hw-table tbody tr:last-child td { border-bottom: none; }
.pill-tersedia  { background: #D1FAE5; color: #065F46; }
.pill-diproses  { background: #FEF3C7; color: #92400E; }
.pill-diadopsi  { background: #E5E7EB; color: #374151; }
.btn-verify {
    background: #16A34A; color: #fff; border: none; border-radius: 10px;
    padding: 8px 20px; font-weight: 600; font-size: .88rem; cursor: pointer;
    transition: background .15s;
}
.btn-verify:hover { background: #15803D; color: #fff; }
.btn-reject {
    background: #EF4444; color: #fff; border: none; border-radius: 10px;
    padding: 8px 20px; font-weight: 600; font-size: .88rem; cursor: pointer;
    transition: background .15s;
}
.btn-reject:hover { background: #DC2626; color: #fff; }
</style>

<a href="{{ route('admin.shelters.index') }}" style="font-size:.88rem; color:var(--pr-orange); text-decoration:none; font-weight:600;">
    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Shelter
</a>

@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<div class="pr-card p-4 mt-3">
    <div class="detail-header">
        <img src="{{ $shelter->logoUrl() }}" alt="" class="detail-avatar">
        <div>
            <h4 class="fw-bold mb-1">{{ $shelter->shelter_name }}</h4>
            <p class="mb-1" style="color:var(--pr-text-muted); font-size:.9rem;">{{ $shelter->user->email ?? '-' }}</p>
            @if($shelter->is_verified)
                <span class="hw-pill pill-verified">Terverifikasi</span>
            @else
                <span class="hw-pill pill-unverified">Menunggu Verifikasi</span>
            @endif
        </div>
    </div>

    <div class="detail-meta mb-4">
        <div class="meta-box">
            <div class="lbl">Pemilik</div>
            <div class="val">{{ $shelter->user->name ?? '-' }}</div>
        </div>
        <div class="meta-box">
            <div class="lbl">Kota</div>
            <div class="val">{{ $shelter->city }}</div>
        </div>
        <div class="meta-box">
            <div class="lbl">No. Telepon</div>
            <div class="val">{{ $shelter->phone ?? '-' }}</div>
        </div>
        <div class="meta-box">
            <div class="lbl">Terdaftar</div>
            <div class="val">{{ $shelter->created_at->format('d M Y, H:i') }}</div>
        </div>
    </div>

    @if($shelter->description)
    <div class="mb-4">
        <h6 class="fw-bold" style="font-size:.88rem;">Deskripsi Shelter</h6>
        <p style="font-size:.9rem; color:var(--pr-text-muted);">{{ $shelter->description }}</p>
    </div>
    @endif

    {{-- Aksi Verifikasi --}}
    <div class="d-flex gap-2">
        @if(!$shelter->is_verified)
        <form method="POST" action="{{ route('admin.shelters.verify', $shelter) }}">
            @csrf
            <button class="btn-verify" type="submit"><i class="bi bi-check-lg me-1"></i>Verifikasi Shelter</button>
        </form>
        @else
        <form method="POST" action="{{ route('admin.shelters.reject', $shelter) }}"
              onsubmit="return confirm('Batalkan verifikasi shelter ini?')">
            @csrf
            <button class="btn-reject" type="submit"><i class="bi bi-x-lg me-1"></i>Batalkan Verifikasi</button>
        </form>
        @endif
    </div>
</div>

{{-- Daftar Hewan Shelter --}}
<div class="pr-card p-4 mt-3">
    <h6 class="fw-bold mb-3">Hewan di Shelter Ini ({{ $shelter->animals->count() }})</h6>

    @if($shelter->animals->count())
    <div class="table-responsive">
        <table class="table hw-table mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Ras</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shelter->animals as $animal)
                <tr>
                    <td class="fw-semibold" style="font-size:.9rem;">{{ $animal->name }}</td>
                    <td style="font-size:.88rem;">{{ ucfirst($animal->species) }}</td>
                    <td style="font-size:.88rem;">{{ $animal->breed }}</td>
                    <td><span class="hw-pill pill-{{ $animal->status }}">{{ ucfirst($animal->status) }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-center py-3 mb-0" style="color:var(--pr-text-muted); font-size:.9rem;">
        Shelter ini belum memiliki hewan terdaftar.
    </p>
    @endif
</div>

@endsection
