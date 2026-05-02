@extends('layouts.guest')
@section('title', 'Bantuan - PawRise')
@section('content')
<section class="pr-hero">
    <div class="container py-5 text-center">
        <span class="pr-badge mb-2">Pusat Bantuan</span>
        <h1 class="fw-bold">Apa yang Bisa Kami Bantu?</h1>
        <p class="text-secondary lead">Temukan jawaban untuk pertanyaan-pertanyaan umum.</p>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 820px;">
        <div class="accordion" id="faqAccordion">
            @php $faqs = [
                ['Bagaimana cara mengadopsi hewan?', 'Cari hewan di katalog, klik "Ajukan Adopsi", isi formulir, lalu tunggu konfirmasi dari shelter.'],
                ['Apakah ada biaya adopsi?', 'Beberapa shelter menerapkan biaya adopsi untuk menutupi vaksinasi dan sterilisasi. Detail biaya akan tertera di halaman hewan.'],
                ['Bagaimana proses verifikasi calon adopter?', 'Shelter akan menghubungi Anda via WhatsApp atau email untuk wawancara dan kunjungan rumah jika diperlukan.'],
                ['Bisakah saya membatalkan permohonan?', 'Ya, hubungi shelter terkait melalui kontak yang tertera atau ajukan pembatalan dari halaman Status Adopsi.'],
                ['Bagaimana cara menjadi mitra shelter?', 'Daftar akun sebagai shelter saat registrasi, isi data shelter Anda, lalu mulai menambahkan hewan asuh.'],
                ['Apakah ada dukungan pasca-adopsi?', 'Tim PawRise dan shelter mitra siap membantu Anda dengan tips perawatan dan konsultasi pasca adopsi.'],
            ]; @endphp
            @foreach($faqs as $i => $f)
                <div class="accordion-item mb-2 border-0 pr-card">
                    <h2 class="accordion-header">
                        <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq-{{$i}}">
                            {{ $f[0] }}
                        </button>
                    </h2>
                    <div id="faq-{{$i}}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">{{ $f[1] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <p class="text-secondary">Masih punya pertanyaan?</p>
            <a href="{{ route('home') }}#kontak" class="btn pr-btn-primary">Hubungi Kami</a>
        </div>
    </div>
</section>
@endsection
