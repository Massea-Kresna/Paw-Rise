@extends('layouts.guest')
@section('title', 'PawRise - Temukan Teman Terbaik Anda')
@section('content')

{{-- ===== HERO ===== --}}
<section class="pr-hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h1 class="pr-hero-title">Temukan Teman <br><span class="pr-text-orange">Terbaik Anda</span></h1>
                <p class="pr-hero-sub">Ribuan hewan peliharaan menunggu untuk memberikan cinta tanpa syarat. Mulai perjalanan adopsi Anda hari ini.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('catalog.index') }}" class="btn pr-btn-primary">Mulai Pencarian</a>
                    <a href="{{ route('education') }}" class="btn pr-btn-outline">Pelajari Lebih Lanjut</a>
                </div>
                <div class="pr-paw-mark mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 100 100" fill="var(--pr-orange)">
                        <ellipse cx="25" cy="18" rx="11" ry="14"/>
                        <ellipse cx="50" cy="11" rx="11" ry="14"/>
                        <ellipse cx="75" cy="18" rx="11" ry="14"/>
                        <ellipse cx="13" cy="44" rx="9" ry="12"/>
                        <ellipse cx="87" cy="44" rx="9" ry="12"/>
                        <path d="M50 34 C33 34 20 45 20 58 C20 70 30 80 50 80 C70 80 80 70 80 58 C80 45 67 34 50 34Z"/>
                    </svg>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="pr-hero-card">
                    <div class="pr-hero-circle">
                        <img src="{{ asset('attached_assets/pets-group.jpg') }}" alt="Hewan peliharaan PawRise">
                    </div>
                    <span class="pr-hero-pill pr-hero-pill--top"><i class="bi bi-heart-fill"></i></span>
                    <span class="pr-hero-pill pr-hero-pill--bottom"><i class="bi bi-house-fill"></i></span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== TENTANG KAMI ===== --}}
<section class="pr-about-section">
    <div class="container">
        <div class="pr-about-card">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-5">
                    <div class="pr-about-photo">
                        <img src="{{ asset('attached_assets/tentang-kami.png') }}" alt="Wanita memeluk anjing golden retriever">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="pr-about-body">
                        <span class="pr-eyebrow">TENTANG KAMI</span>
                        <h2 class="pr-section-title">Menghubungkan Hati,<br>Menyelamatkan Nyawa</h2>
                        <p class="pr-muted">PawRise didirikan dengan satu misi sederhana: memastikan setiap hewan peliharaan menemukan rumah yang penuh kasih. Kami bekerja sama dengan ratusan shelter di seluruh Indonesia untuk memudahkan proses adopsi yang aman, transparan, dan penuh kasih sayang.</p>
                        <ul class="pr-check-list">
                            <li><span class="pr-check"><i class="bi bi-check-lg"></i></span>Jaringan shelter terverifikasi di seluruh Indonesia</li>
                            <li><span class="pr-check"><i class="bi bi-check-lg"></i></span>Proses adopsi yang transparan dan mudah dipantau</li>
                            <li><span class="pr-check"><i class="bi bi-check-lg"></i></span>Dukungan komunitas pasca-adopsi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== PUSAT EDUKASI ===== --}}
<section class="pr-edu-section">
    <div class="container">

        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-2">
            <div>
                <span class="pr-eyebrow">Pusat Edukasi PawRise</span>
                <h2 class="pr-section-title">Bekal Terbaik untuk Teman Berbulu<br>Anda</h2>
                <p class="pr-muted">Pelajari cara merawat, melatih, dan memahami hewan peliharaan Anda melalui<br>panduan lengkap dari para ahli kami.</p>
            </div>
            <a href="{{ route('education') }}" class="d-inline-flex align-items-center gap-2 fw-bold text-decoration-none mt-2" style="color:var(--pr-orange); white-space:nowrap; font-size:0.9rem;">
                Lihat Semua Artikel <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        {{-- Filter Tabs --}}
        <div class="d-flex gap-2 flex-wrap mb-4">
            <button class="pr-chip active">Semua Artikel</button>
            <button class="pr-chip">Kesehatan</button>
            <button class="pr-chip">Pelatihan</button>
            <button class="pr-chip">Nutrisi</button>
            <button class="pr-chip">Gaya Hidup</button>
        </div>

        {{-- Article Cards --}}
        <div class="row g-4">
            <div class="col-md-4">
                <a href="{{ route('education') }}" class="text-decoration-none d-block h-100">
                    <div class="pr-card h-100 p-0 overflow-hidden">
                        <div class="pr-img-placeholder" style="height:200px; border-radius:0;">
                            <i class="bi bi-image" style="font-size:2rem;"></i>
                        </div>
                        <div class="p-4">
                            <span class="pr-eyebrow">Gaya Hidup</span>
                            <h5 class="fw-bold mt-1 mb-2" style="color:var(--pr-text); font-family:'Manrope',sans-serif;">Panduan Hari Pertama: Sambut Anggota Keluarga Baru</h5>
                            <p class="pr-muted small mb-0">Membawa pulang hewan peliharaan baru adalah momen mendebarkan. Inilah yang perlu Anda siapkan agar mereka...</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <small class="pr-muted">5 Menit Baca</small>
                                <i class="bi bi-arrow-right" style="color:var(--pr-orange);"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('education') }}" class="text-decoration-none d-block h-100">
                    <div class="pr-card h-100 p-0 overflow-hidden">
                        <div class="pr-img-placeholder" style="height:200px; border-radius:0;">
                            <i class="bi bi-image" style="font-size:2rem;"></i>
                        </div>
                        <div class="p-4">
                            <span class="pr-eyebrow">Nutrisi</span>
                            <h5 class="fw-bold mt-1 mb-2" style="color:var(--pr-text); font-family:'Manrope',sans-serif;">Nutrisi Seimbang: Apa yang Sebenarnya Mereka Butuhkan?</h5>
                            <p class="pr-muted small mb-0">Pahami kebutuhan nutrisi spesifik berdasarkan usia dan jenis hewan untuk kesehatan jangka panjang yang optimal...</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <small class="pr-muted">8 Menit Baca</small>
                                <i class="bi bi-arrow-right" style="color:var(--pr-orange);"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('education') }}" class="text-decoration-none d-block h-100">
                    <div class="pr-card h-100 p-0 overflow-hidden">
                        <div class="pr-img-placeholder" style="height:200px; border-radius:0;">
                            <i class="bi bi-image" style="font-size:2rem;"></i>
                        </div>
                        <div class="p-4">
                            <span class="pr-eyebrow">Kesehatan</span>
                            <h5 class="fw-bold mt-1 mb-2" style="color:var(--pr-text); font-family:'Manrope',sans-serif;">Mengenal Tanda-tanda Hewan Sakit</h5>
                            <p class="pr-muted small mb-0">Deteksi dini dapat menyelamatkan nyawa. Kenali perubahan perilaku dan fisik yang memerlukan perhatian medis...</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <small class="pr-muted">6 Menit Baca</small>
                                <i class="bi bi-arrow-right" style="color:var(--pr-orange);"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</section>

{{-- ===== HUBUNGI KAMI ===== --}}
<section class="pr-contact-section" id="kontak">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="pr-section-title">Hubungi Kami</h2>
            <p class="pr-muted">Ada pertanyaan tentang proses adopsi atau ingin berkolaborasi? Kami siap mendengarkan.</p>
        </div>

        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="pr-contact-info">
                    <h4 class="fw-bold mb-4" style="font-family:'Manrope',sans-serif;">Informasi Kontak</h4>
                    <div class="pr-contact-row">
                        <div class="pr-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <div class="fw-semibold">Kantor Pusat</div>
                            <div class="opacity-75">Gg. Butuan 1, Tembalang, Kec. Tembalang,<br>Kota Semarang, Jawa Tengah 50275</div>
                        </div>
                    </div>
                    <div class="pr-contact-row">
                        <div class="pr-contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <div class="fw-semibold">Email</div>
                            <div class="opacity-75">pawpaw@gmail.com</div>
                        </div>
                    </div>
                    <div class="pr-contact-row">
                        <div class="pr-contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div>
                            <div class="fw-semibold">Telepon</div>
                            <div class="opacity-75">+62 812 7510 2564</div>
                        </div>
                    </div>
                    <div class="pr-contact-photo mt-4">
                        <img src="{{ asset('attached_assets/hubungi-kami.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="pr-contact-form">
                    <form method="POST" action="{{ route('contact.send') }}" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Nama Depan</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Budi" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama Belakang</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Santoso">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alamat Email</label>
                            <input type="email" name="email" class="form-control" placeholder="budi.santoso@email.com" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subjek</label>
                            <select name="subject" class="form-select" required>
                                <option value="Pertanyaan Adopsi">Pertanyaan Adopsi</option>
                                <option value="Kerjasama Shelter">Kerjasama Shelter</option>
                                <option value="Gabung Relawan">Gabung Relawan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Pesan</label>
                            <textarea name="message" rows="5" class="form-control" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn pr-btn-primary w-100">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.querySelectorAll('.pr-chip').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.pr-chip').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });
</script>
@endpush