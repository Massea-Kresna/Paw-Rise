@extends('layouts.shelter')
@section('title', 'Dashboard - PawRise Shelter')
@section('content')
<div class="container-fluid p-4">
    <div class="row g-4">
        <div class="col-lg-3">@include('partials.sidebar-shelter')</div>
        <div class="col-lg-9">
            <h3 class="fw-bold mb-1">Dashboard</h3>
            <p class="text-secondary">Selamat datang kembali, {{ auth()->user()->name }}.</p>

            @php
                $shelter = auth()->user()->shelter;
                $totalAnimals = $shelter ? $shelter->animals()->count() : 0;
                $available = $shelter ? $shelter->animals()->where('status','tersedia')->count() : 0;
                $process = $shelter ? $shelter->animals()->where('status','diproses')->count() : 0;
                $adopted = $shelter ? $shelter->animals()->where('status','diadopsi')->count() : 0;
            @endphp

            <div class="row g-3 mb-4">
                <div class="col-md-3"><div class="pr-stat-card"><small>Total Hewan</small><h3>{{ $totalAnimals }}</h3></div></div>
                <div class="col-md-3"><div class="pr-stat-card"><small>Tersedia</small><h3>{{ $available }}</h3></div></div>
                <div class="col-md-3"><div class="pr-stat-card"><small>Diproses</small><h3>{{ $process }}</h3></div></div>
                <div class="col-md-3"><div class="pr-stat-card"><small>Diadopsi</small><h3>{{ $adopted }}</h3></div></div>
            </div>

            <div class="pr-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Hewan Terbaru</h5>
                    <a href="{{ route('shelter.animals.create') }}" class="btn pr-btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Tambah Hewan</a>
                </div>
                @if($animals->count())
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead><tr><th>Foto</th><th>Nama</th><th>Jenis</th><th>Status</th><th>Aksi</th></tr></thead>
                            <tbody>
                            @foreach($animals as $animal)
                                <tr>
                                    <td><img src="{{ $animal->mainPhotoUrl() }}" alt="" style="width:48px; height:48px; object-fit:cover; border-radius:8px;"></td>
                                    <td><strong>{{ $animal->name }}</strong><br><small class="text-secondary">{{ $animal->breed }}</small></td>
                                    <td>{{ ucfirst($animal->species) }}</td>
                                    <td><span class="badge bg-secondary">{{ ucfirst($animal->status) }}</span></td>
                                    <td>
                                        <a href="{{ route('shelter.animals.edit', $animal) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $animals->links() }}
                @else
                    <p class="text-secondary text-center py-3 mb-0">Belum ada hewan terdaftar.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
