@extends('layouts.admin')
@section('title', 'Detail Pengguna - PawRise Admin')
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
</style>

<a href="{{ route('admin.users.index') }}" style="font-size:.88rem; color:var(--pr-orange); text-decoration:none; font-weight:600;">
    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pengguna
</a>

<div class="pr-card p-4 mt-3">
    <div class="detail-header">
        <img src="{{ $user->profilePhotoUrl() }}" alt="" class="detail-avatar">
        <div>
            <h4 class="fw-bold mb-1">{{ $user->name }}</h4>
            <p class="mb-0" style="color:var(--pr-text-muted); font-size:.9rem;">{{ $user->email }}</p>
        </div>
    </div>

    <div class="detail-meta">
        <div class="meta-box">
            <div class="lbl">Role</div>
            <div class="val">{{ ucfirst($user->role) }}</div>
        </div>
        <div class="meta-box">
            <div class="lbl">No. Telepon</div>
            <div class="val">{{ $user->phone ?? '-' }}</div>
        </div>
        <div class="meta-box">
            <div class="lbl">Alamat</div>
            <div class="val">{{ $user->address ?? '-' }}</div>
        </div>
        <div class="meta-box">
            <div class="lbl">Bergabung</div>
            <div class="val">{{ $user->created_at->format('d M Y, H:i') }}</div>
        </div>
    </div>
</div>

{{-- Riwayat Permohonan --}}
<div class="pr-card p-4 mt-3">
    <h6 class="fw-bold mb-3">Riwayat Permohonan Adopsi</h6>
    @if($user->applications->count())
    <div class="table-responsive">
        <table class="table hw-table mb-0">
            <thead>
                <tr>
                    <th>Hewan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->applications as $app)
                <tr>
                    <td class="fw-semibold" style="font-size:.9rem;">{{ $app->animal->name ?? '-' }}</td>
                    <td>
                        <span class="hw-pill pill-{{ $app->status }}">{{ ucfirst($app->status) }}</span>
                    </td>
                    <td style="font-size:.82rem; color:var(--pr-text-muted);">{{ $app->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-center py-3 mb-0" style="color:var(--pr-text-muted); font-size:.9rem;">
        Belum ada riwayat permohonan.
    </p>
    @endif
</div>

<style>
.hw-table th {
    font-size: .72rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .07em; color: var(--pr-text-muted);
    padding: 12px 16px; border-bottom: 1.5px solid var(--pr-border); background: #fff;
}
.hw-table td { padding: 14px 16px; border-bottom: 1px solid var(--pr-border); vertical-align: middle; }
.hw-table tbody tr:last-child td { border-bottom: none; }
.hw-pill {
    padding: 4px 14px; border-radius: 999px; font-size: .75rem; font-weight: 700; display: inline-block;
}
.pill-menunggu  { background: #FEF3C7; color: #92400E; }
.pill-disetujui { background: #D1FAE5; color: #065F46; }
.pill-ditolak   { background: #FEE2E2; color: #991B1B; }
</style>

@endsection
