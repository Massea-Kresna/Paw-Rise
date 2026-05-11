@extends('layouts.guest')
@section('title', $kontenEdukasi->judul . ' - PawRise')
@section('content')

<section class="py-5">
    <div class="container" style="max-width: 860px;">

        {{-- Back --}}
        <a href="{{ route('education') }}"
           class="d-inline-flex align-items-center gap-2 mb-4 text-decoration-none fw-semibold"
           style="color:var(--pr-text-muted); font-size:.88rem;">
            <i class="bi bi-arrow-left"></i> Kembali ke Edukasi
        </a>

        {{-- Header --}}
        <span class="pr-eyebrow">{{ $kontenEdukasi->kategori_label }}</span>
        <h1 class="fw-bold mt-2 mb-3">{{ $kontenEdukasi->judul }}</h1>
        <p class="pr-muted mb-4">
            <i class="bi bi-clock me-1"></i> {{ $kontenEdukasi->estimasi_baca }} menit baca
            &nbsp;·&nbsp;
            {{ $kontenEdukasi->published_at?->format('d M Y') }}
        </p>

        {{-- Thumbnail --}}
        @if($kontenEdukasi->gambar)
            <img src="{{ $kontenEdukasi->gambar_url }}"
                 alt="{{ $kontenEdukasi->judul }}"
                 class="w-100 rounded-4 mb-4"
                 style="max-height:420px; object-fit:cover;">
        @endif

        {{-- Konten --}}
        <div style="line-height:1.9; font-size:1.05rem; color:var(--pr-text);">
            {!! nl2br(e($kontenEdukasi->konten)) !!}
        </div>

        {{-- Artikel Terkait --}}
        @if($related->count())
            <hr class="my-5">
            <h4 class="fw-bold mb-4">Artikel Terkait</h4>
            <div class="row g-3">
                @foreach($related as $item)
                    <div class="col-md-4">
                        <a href="{{ route('education.show', $item) }}" class="text-decoration-none">
                            <div class="pr-card p-3">
                                <span class="pr-eyebrow">{{ $item->kategori_label }}</span>
                                <h6 class="fw-bold mt-1 mb-1" style="color:var(--pr-text);">
                                    {{ Str::limit($item->judul, 60) }}
                                </h6>
                                <small class="pr-muted">{{ $item->estimasi_baca }} menit baca</small>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

@endsection
