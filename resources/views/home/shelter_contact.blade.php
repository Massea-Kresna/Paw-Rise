@extends('layouts.guest')
@section('title', 'Kontak Shelter - PawRise')
@section('content')
<section class="py-5 bg-white">
    <div class="container" style="max-width: 800px;">
        <h1 class="fw-bold mb-4">Kontak Shelter</h1>
        
        <div class="mt-4 text-center p-5 rounded" style="background: var(--pr-bg); border: 1px solid var(--pr-border);">
            <i class="bi bi-house-door-fill mb-3 d-block" style="font-size: 3rem; color: var(--pr-orange);"></i>
            <h3 class="fw-bold">Ingin Bekerja Sama Sebagai Shelter?</h3>
            <p class="text-muted mt-3 mb-4">Kami sangat senang menyambut shelter baru ke dalam jaringan PawRise. Bersama kita bisa menyelamatkan lebih banyak nyawa hewan peliharaan.</p>
            <a href="{{ route('register') }}" class="btn pr-btn-primary btn-lg">Daftar Sebagai Shelter</a>
            <p class="mt-4 mb-0 text-muted">Atau hubungi tim kemitraan kami di <br><strong>shelter-partner@pawrise.id</strong></p>
        </div>
    </div>
</section>
@endsection
