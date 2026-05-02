@extends('layouts.shelter')
@section('title', 'Kelola Hewan - PawRise Shelter')
@section('content')
<div class="container-fluid p-4">
    <div class="row g-4">
        <div class="col-lg-3">@include('partials.sidebar-shelter')</div>
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold mb-0">Kelola Hewan</h3>
                <a href="{{ route('shelter.animals.create') }}" class="btn pr-btn-primary"><i class="bi bi-plus-lg"></i> Tambah Hewan</a>
            </div>
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

            <form method="GET" class="pr-card p-3 mb-3 d-flex gap-2 flex-wrap">
                <input name="q" value="{{ request('q') }}" class="form-control form-control-sm flex-grow-1" placeholder="Cari nama atau ras...">
                <select name="species" class="form-select form-select-sm" style="max-width: 160px;">
                    <option value="">Semua jenis</option>
                    @foreach(['anjing','kucing','lainnya'] as $sp)<option value="{{$sp}}" {{request('species')==$sp?'selected':''}}>{{ucfirst($sp)}}</option>@endforeach
                </select>
                <select name="status" class="form-select form-select-sm" style="max-width: 160px;">
                    <option value="">Semua status</option>
                    @foreach(['tersedia','diproses','diadopsi'] as $st)<option value="{{$st}}" {{request('status')==$st?'selected':''}}>{{ucfirst($st)}}</option>@endforeach
                </select>
                <button class="btn pr-btn-primary btn-sm">Filter</button>
            </form>

            <div class="pr-card p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light"><tr><th>Foto</th><th>Nama</th><th>Jenis</th><th>Usia</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
                        <tbody>
                        @forelse($animals as $animal)
                            <tr>
                                <td><img src="{{ $animal->mainPhotoUrl() }}" alt="" style="width:48px; height:48px; object-fit:cover; border-radius:8px;"></td>
                                <td><strong>{{ $animal->name }}</strong><br><small class="text-secondary">{{ $animal->breed }}</small></td>
                                <td>{{ ucfirst($animal->species) }}</td>
                                <td>{{ $animal->ageLabel() }}</td>
                                <td><span class="badge bg-secondary">{{ ucfirst($animal->status) }}</span></td>
                                <td class="text-end">
                                    <a href="{{ route('shelter.animals.edit', $animal) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                    <form method="POST" action="{{ route('shelter.animals.destroy', $animal) }}" class="d-inline" onsubmit="return confirm('Hapus data hewan ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-secondary py-4">Belum ada hewan terdaftar.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">{{ $animals->links() }}</div>
        </div>
    </div>
</div>
@endsection
