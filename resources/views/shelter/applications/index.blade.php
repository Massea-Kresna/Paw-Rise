@extends('layouts.shelter')
@section('title', 'Permohonan - PawRise Shelter')
@section('content')
<div class="container-fluid p-4">
    <div class="row g-4">
        <div class="col-lg-3">@include('partials.sidebar-shelter')</div>
        <div class="col-lg-9">
            <h3 class="fw-bold mb-3">Permohonan Adopsi</h3>
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

            <form method="GET" class="pr-card p-3 mb-3 d-flex gap-2">
                <select name="status" class="form-select form-select-sm" style="max-width: 200px;">
                    <option value="">Semua status</option>
                    @foreach(['menunggu','disetujui','ditolak'] as $st)<option value="{{$st}}" {{request('status')==$st?'selected':''}}>{{ucfirst($st)}}</option>@endforeach
                </select>
                <button class="btn pr-btn-primary btn-sm">Filter</button>
            </form>

            <div class="pr-card p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light"><tr><th>Hewan</th><th>Pemohon</th><th>Tanggal</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
                        <tbody>
                        @forelse($apps as $app)
                            <tr>
                                <td><strong>{{ $app->animal->name }}</strong><br><small class="text-secondary">{{ $app->animal->breed }}</small></td>
                                <td>{{ $app->full_name }}<br><small class="text-secondary">{{ $app->whatsapp }}</small></td>
                                <td>{{ $app->created_at->format('d M Y') }}</td>
                                <td>
                                    @php $color = ['menunggu'=>'warning','disetujui'=>'success','ditolak'=>'danger'][$app->status] ?? 'secondary'; @endphp
                                    <span class="badge bg-{{ $color }}">{{ ucfirst($app->status) }}</span>
                                </td>
                                <td class="text-end"><a href="{{ route('shelter.applications.show', $app) }}" class="btn btn-sm pr-btn-outline">Lihat</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-secondary py-4">Belum ada permohonan.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">{{ $apps->links() }}</div>
        </div>
    </div>
</div>
@endsection
