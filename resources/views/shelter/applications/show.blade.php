@extends('layouts.shelter')
@section('title', 'Detail Permohonan - PawRise Shelter')
@section('content')
<div class="container-fluid p-4">
    <div class="row g-4">
        <div class="col-lg-3">@include('partials.sidebar-shelter')</div>
        <div class="col-lg-9">
            <a href="{{ route('shelter.applications.index') }}" class="text-decoration-none text-secondary mb-3 d-inline-block"><i class="bi bi-arrow-left"></i> Kembali</a>

            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="pr-card overflow-hidden">
                        <img src="{{ $application->animal->mainPhotoUrl() }}" alt="" style="height: 200px; width: 100%; object-fit: cover;">
                        <div class="p-3">
                            <h5 class="fw-bold mb-1">{{ $application->animal->name }}</h5>
                            <p class="text-secondary small mb-0">{{ $application->animal->breed }} · {{ $application->animal->ageLabel() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="pr-card p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h4 class="fw-bold mb-0">Detail Permohonan</h4>
                            @php $color = ['menunggu'=>'warning','disetujui'=>'success','ditolak'=>'danger'][$application->status] ?? 'secondary'; @endphp
                            <span class="badge bg-{{ $color }} fs-6">{{ ucfirst($application->status) }}</span>
                        </div>

                        <dl class="row mb-0">
                            <dt class="col-sm-4">Nama</dt><dd class="col-sm-8">{{ $application->full_name }}</dd>
                            <dt class="col-sm-4">WhatsApp</dt><dd class="col-sm-8">{{ $application->whatsapp }}</dd>
                            <dt class="col-sm-4">Email</dt><dd class="col-sm-8">{{ $application->email }}</dd>
                            <dt class="col-sm-4">Alamat</dt><dd class="col-sm-8">{{ $application->address }}</dd>
                            <dt class="col-sm-4">Pengalaman</dt><dd class="col-sm-8">{{ ucfirst($application->experience) }}</dd>
                            <dt class="col-sm-4">Alasan</dt><dd class="col-sm-8">{{ $application->reason }}</dd>
                            <dt class="col-sm-4">Diajukan</dt><dd class="col-sm-8">{{ $application->created_at->format('d M Y H:i') }}</dd>
                        </dl>

                        @if($application->status === 'menunggu')
                            <hr>
                            <div class="d-flex gap-2 justify-content-end">
                                <form method="POST" action="{{ route('shelter.applications.reject', $application) }}" class="d-inline">@csrf
                                    <button class="btn btn-outline-danger">Tolak</button>
                                </form>
                                <form method="POST" action="{{ route('shelter.applications.approve', $application) }}" class="d-inline">@csrf
                                    <button class="btn pr-btn-primary">Setujui</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
