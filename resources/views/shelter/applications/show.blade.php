@extends('layouts.shelter')
@section('title', 'Detail Permohonan - PawRise Shelter')
@section('content')

<a href="{{ route('shelter.applications.index') }}" class="text-decoration-none text-secondary mb-3 d-inline-block">
    <i class="bi bi-arrow-left"></i> Kembali
</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

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
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                        Tolak
                    </button>
                    <form method="POST" action="{{ route('shelter.applications.approve', $application) }}" class="d-inline">
                        @csrf
                        <button class="btn pr-btn-primary">Setujui</button>
                    </form>
                </div>

                {{-- Modal Tolak --}}
                <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border-0 rounded-4 shadow">
                            <form method="POST" action="{{ route('shelter.applications.reject', $application) }}">
                                @csrf
                                <div class="modal-header border-0 pb-0">
                                    <h5 class="modal-title fw-bold" id="rejectModalLabel">Tolak Permohonan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-secondary small">Berikan alasan penolakan agar calon adopter dapat memahami keputusannya (opsional).</p>
                                    <textarea name="note" rows="3" class="form-control" placeholder="Tulis catatan penolakan..."></textarea>
                                </div>
                                <div class="modal-footer border-0 pt-0">
                                    <button type="button" class="btn pr-btn-outline" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger text-white rounded-3 px-4 py-2 fw-semibold">Konfirmasi Tolak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection