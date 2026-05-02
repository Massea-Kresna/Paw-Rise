@extends('layouts.user')
@section('title', 'Ajukan Adopsi - PawRise')
@section('content')
<div class="container py-5">
    <a href="{{ route('animals.show', $animal) }}" class="text-decoration-none text-secondary mb-3 d-inline-block"><i class="bi bi-arrow-left"></i> Kembali</a>
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="pr-card p-4 p-md-5">
                <h2 class="fw-bold mb-1">Formulir Adopsi</h2>
                <p class="text-secondary mb-4">Isi formulir berikut untuk mengajukan adopsi {{ $animal->name }}.</p>

                @if($errors->any())
                    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{$e}}</li>@endforeach</ul></div>
                @endif

                <form method="POST" action="{{ route('adoption.store', $animal) }}" class="d-grid gap-3">
                    @csrf
                    <h6 class="fw-bold mt-2">Data Pribadi</h6>
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Nama Lengkap</label><input type="text" name="full_name" value="{{ old('full_name', auth()->user()->name) }}" class="form-control" required></div>
                        <div class="col-md-6"><label class="form-label">No. WhatsApp</label><input type="text" name="whatsapp" value="{{ old('whatsapp', auth()->user()->phone) }}" class="form-control" required></div>
                        <div class="col-12"><label class="form-label">Email</label><input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" required></div>
                        <div class="col-12"><label class="form-label">Alamat Lengkap</label><textarea name="address" rows="2" class="form-control" required>{{ old('address', auth()->user()->address) }}</textarea></div>
                    </div>

                    <h6 class="fw-bold mt-3">Pengalaman & Motivasi</h6>
                    <div>
                        <label class="form-label">Pengalaman memelihara hewan</label>
                        <select name="experience" class="form-select" required>
                            <option value="">Pilih...</option>
                            <option value="belum" {{ old('experience')=='belum'?'selected':'' }}>Belum pernah</option>
                            <option value="pernah" {{ old('experience')=='pernah'?'selected':'' }}>Pernah</option>
                            <option value="sedang" {{ old('experience')=='sedang'?'selected':'' }}>Sedang memelihara</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Mengapa Anda ingin mengadopsi {{ $animal->name }}?</label>
                        <textarea name="reason" rows="4" class="form-control" required>{{ old('reason') }}</textarea>
                    </div>

                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="agreement" value="1" id="agreement" required>
                        <label class="form-check-label" for="agreement">Saya menyetujui syarat & ketentuan PawRise serta berkomitmen merawat hewan dengan kasih sayang.</label>
                    </div>
                    <button type="submit" class="btn pr-btn-primary btn-lg">Kirim Permohonan</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="pr-card overflow-hidden sticky-top" style="top: 90px;">
                <img src="{{ $animal->mainPhotoUrl() }}" alt="" style="height: 220px; width: 100%; object-fit: cover;">
                <div class="p-3">
                    <h5 class="fw-bold mb-1">{{ $animal->name }}</h5>
                    <p class="text-secondary small mb-2"><i class="bi bi-geo-alt"></i> {{ $animal->shelter->shelter_name ?? '' }}</p>
                    <ul class="list-unstyled small mb-0">
                        <li><strong>Ras:</strong> {{ $animal->breed }}</li>
                        <li><strong>Usia:</strong> {{ $animal->ageLabel() }}</li>
                        <li><strong>Jenis Kelamin:</strong> {{ ucfirst($animal->gender) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
