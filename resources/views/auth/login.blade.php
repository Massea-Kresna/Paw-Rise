@extends('layouts.auth')
@section('title', 'Masuk - PawRise')
@section('content')
<div class="pr-auth-card">
    <h2 class="fw-bold mb-2">Selamat Datang Kembali</h2>
    <p class="text-secondary mb-4">Masuk untuk melanjutkan perjalanan adopsi Anda.</p>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" class="d-grid gap-3">
        @csrf
        <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="nama@email.com" required autofocus>
        </div>
        <div>
            <label class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
            <a href="#" class="text-decoration-none" style="color: var(--pr-orange);">Lupa Kata Sandi?</a>
        </div>
        <button type="submit" class="btn pr-btn-primary btn-lg">Masuk</button>
    </form>

    <p class="text-center mt-4 mb-0">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold" style="color: var(--pr-orange);">Daftar Sekarang</a>
    </p>
</div>
@endsection
