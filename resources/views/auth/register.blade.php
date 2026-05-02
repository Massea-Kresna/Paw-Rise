@extends('layouts.auth')
@section('title', 'Daftar - PawRise')
@section('content')
<div class="pr-auth-card">
    <h2 class="fw-bold mb-2">Daftar Akun</h2>
    <p class="text-secondary mb-4">Bergabunglah dengan keluarga PawRise.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}" class="d-grid gap-3">
        @csrf
        <div class="btn-group w-100" role="group">
            <input type="radio" class="btn-check" name="role" id="role-adopter" value="adopter" {{ old('role','adopter') === 'adopter' ? 'checked' : '' }} onchange="document.getElementById('shelter-fields').style.display='none'">
            <label class="btn btn-outline-warning" for="role-adopter">Saya Calon Adopter</label>

            <input type="radio" class="btn-check" name="role" id="role-shelter" value="shelter" {{ old('role') === 'shelter' ? 'checked' : '' }} onchange="document.getElementById('shelter-fields').style.display='block'">
            <label class="btn btn-outline-warning" for="role-shelter">Saya Shelter</label>
        </div>

        <div>
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>
        <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>
        <div>
            <label class="form-label">No. Telepon</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="08xxxxxxxxxx" required>
        </div>

        <div id="shelter-fields" style="display: {{ old('role') === 'shelter' ? 'block' : 'none' }};">
            <div class="mb-3">
                <label class="form-label">Nama Shelter</label>
                <input type="text" name="shelter_name" value="{{ old('shelter_name') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Kota</label>
                <input type="text" name="city" value="{{ old('city') }}" class="form-control">
            </div>
        </div>

        <div>
            <label class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div>
            <label class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn pr-btn-primary btn-lg">Daftar Sekarang</button>
    </form>

    <p class="text-center mt-4 mb-0">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-decoration-none fw-semibold" style="color: var(--pr-orange);">Masuk</a>
    </p>
</div>
@endsection
