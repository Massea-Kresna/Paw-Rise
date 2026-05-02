@extends('layouts.guest')
@section('title', 'Edukasi - PawRise')
@section('content')
<section class="pr-hero">
    <div class="container py-5">
        <div class="text-center">
            <span class="pr-badge mb-2">Edukasi</span>
            <h1 class="fw-bold">Pelajari Cara Merawat Hewan dengan Baik</h1>
            <p class="text-secondary lead">Tips, panduan, dan informasi penting untuk calon adopter.</p>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @php $articles = [
                ['title' => 'Persiapan Sebelum Mengadopsi Hewan', 'excerpt' => 'Hal-hal penting yang perlu Anda persiapkan sebelum membawa pulang sahabat baru.', 'icon' => 'house-heart'],
                ['title' => 'Vaksinasi & Perawatan Kesehatan', 'excerpt' => 'Panduan lengkap vaksinasi dan perawatan kesehatan rutin untuk anjing dan kucing.', 'icon' => 'heart-pulse'],
                ['title' => 'Nutrisi yang Tepat untuk Hewan Anda', 'excerpt' => 'Pilihan makanan terbaik berdasarkan usia, ukuran, dan jenis hewan.', 'icon' => 'cup-straw'],
                ['title' => 'Sosialisasi & Pelatihan Dasar', 'excerpt' => 'Cara melatih hewan agar terbiasa di rumah baru dan berinteraksi dengan keluarga.', 'icon' => 'people'],
                ['title' => 'Tanda-tanda Hewan Stres', 'excerpt' => 'Kenali sinyal hewan Anda saat tidak nyaman dan bagaimana menanganinya.', 'icon' => 'emoji-frown'],
                ['title' => 'Perawatan Bulu & Kebersihan', 'excerpt' => 'Tips merawat bulu, kuku, telinga, dan gigi hewan kesayangan.', 'icon' => 'droplet'],
            ]; @endphp
            @foreach($articles as $a)
                <div class="col-md-6 col-lg-4">
                    <div class="pr-card p-4 h-100">
                        <div class="pr-icon-circle mb-3"><i class="bi bi-{{ $a['icon'] }}"></i></div>
                        <h5 class="fw-bold">{{ $a['title'] }}</h5>
                        <p class="text-secondary mb-0">{{ $a['excerpt'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
