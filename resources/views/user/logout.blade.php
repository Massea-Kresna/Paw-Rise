@extends('layouts.user')
@section('title', 'Konfirmasi Keluar - PawRise')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="pr-card p-5 text-center">
                <i class="bi bi-box-arrow-right" style="font-size: 60px; color: var(--pr-orange)"></i>
                <h3 class="fw-bold mt-3">Yakin ingin keluar?</h3>
                <p class="text-secondary">Anda akan keluar dari akun PawRise Anda.</p>
                <div class="d-flex gap-2 justify-content-center mt-4">
                    <a href="{{ route('user.profile') }}" class="btn btn-outline-secondary">Batal</a>
                    <form method="POST" action="{{ route('logout') }}">@csrf
                        <button class="btn pr-btn-primary">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
