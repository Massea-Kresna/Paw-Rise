@extends('layouts.guest')
@section('title', 'Gabung Relawan - PawRise')
@section('content')
<section class="py-5 bg-white">
    <div class="container" style="max-width: 800px;">
        <h1 class="fw-bold mb-4">Gabung Menjadi Relawan</h1>
        
        <div class="row align-items-center mt-5 mb-5">
            <div class="col-md-6 order-md-2">
                <img src="{{ asset('attached_assets/tentang-kami.png') }}" alt="Relawan" class="img-fluid rounded" style="object-fit: cover; height: 300px; width: 100%;">
            </div>
            <div class="col-md-6 order-md-1 mt-4 mt-md-0">
                <h3 class="fw-bold">Jadilah Pahlawan Mereka</h3>
                <p class="text-muted mt-3">Hewan-hewan di shelter kami membutuhkan kasih sayang dan bantuan dari orang-orang seperti Anda. Mulai dari mengajak jalan-jalan, membersihkan kandang, hingga membantu acara adopsi.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Waktu yang fleksibel</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Sertifikat relawan</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pengalaman berharga</li>
                </ul>
            </div>
        </div>

        <div class="p-4 rounded text-center" style="background: var(--pr-orange-light); border: 1px solid var(--pr-border);">
            <h4 class="fw-bold mb-3">Siap untuk Bergabung?</h4>
            <p class="text-muted mb-4">Kirimkan data diri singkat dan motivasi Anda untuk bergabung ke email kami.</p>
            <a href="mailto:relawan@pawrise.id" class="btn pr-btn-primary btn-lg"><i class="bi bi-envelope-fill me-2"></i> Email relawan@pawrise.id</a>
        </div>
    </div>
</section>
@endsection
