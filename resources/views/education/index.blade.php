@extends('layouts.guest')
@section('title', 'Pusat Edukasi - PawRise')
@section('content')

<section class="pr-hero-section" style="padding: 60px 0 40px;">
    <div class="container text-center">
        <span class="pr-eyebrow">PUSAT EDUKASI PAWRISE</span>
        <h1 class="pr-section-title mt-2">Bekal Terbaik untuk Teman Berbulu Anda</h1>
        <p class="pr-muted">Pelajari cara merawat, melatih, dan memahami hewan peliharaan Anda melalui panduan lengkap dari para ahli kami.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">

        {{-- Filter Kategori --}}
        <div class="d-flex gap-2 flex-wrap mb-4">
            <a href="{{ route('education') }}"
               class="pr-chip {{ !request('kategori') ? 'active' : '' }}">
               Semua Artikel
            </a>
            @foreach(['kesehatan' => 'Kesehatan', 'pelatihan' => 'Pelatihan', 'nutrisi' => 'Nutrisi', 'gaya_hidup' => 'Gaya Hidup'] as $val => $label)
                <a href="{{ route('education', ['kategori' => $val]) }}"
                   class="pr-chip {{ request('kategori') === $val ? 'active' : '' }}">
                   {{ $label }}
                </a>
            @endforeach
        </div>

        {{-- Grid Artikel --}}
        @if($artikel->count())
            <div class="row g-4">
                @foreach($artikel as $item)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('education.show', $item) }}" class="text-decoration-none d-block h-100">
                            <div class="pr-card h-100 p-0 overflow-hidden">

                                {{-- Thumbnail --}}
                                @if($item->gambar)
                                    <img src="{{ $item->gambar_url }}"
                                         alt="{{ $item->judul }}"
                                         style="width:100%; height:200px; object-fit:cover;">
                                @else
                                    <div style="height:200px; background:var(--pr-orange-light);
                                                display:flex; align-items:center; justify-content:center;">
                                        <i class="bi bi-image" style="font-size:2rem; color:var(--pr-orange);"></i>
                                    </div>
                                @endif

                                <div class="p-4">
                                    <span class="pr-eyebrow">{{ $item->kategori_label }}</span>
                                    <h5 class="fw-bold mt-1 mb-2" style="color:var(--pr-text);">
                                        {{ $item->judul }}
                                    </h5>
                                    <p class="pr-muted small mb-0">
                                        {{ Str::limit($item->ringkasan, 100) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                        <small class="pr-muted">{{ $item->estimasi_baca }} Menit Baca</small>
                                        <i class="bi bi-arrow-right" style="color:var(--pr-orange);"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($artikel->hasPages())
                <div class="mt-4">{{ $artikel->links() }}</div>
            @endif

        @else
            <div class="text-center py-5">
                <i class="bi bi-journal-x" style="font-size:3rem; color:var(--pr-orange-light);"></i>
                <h5 class="fw-bold mt-3">Belum ada artikel</h5>
                <p class="pr-muted">Coba pilih kategori lain.</p>
            </div>
        @endif

    </div>
</section>

@endsection
