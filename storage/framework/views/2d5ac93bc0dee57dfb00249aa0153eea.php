<?php $__env->startSection('title', 'PawRise - Temukan Teman Terbaik Anda'); ?>
<?php $__env->startSection('content'); ?>


<section class="pr-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h1 class="pr-hero-title">Temukan Teman <br><span class="pr-text-orange">Terbaik Anda</span></h1>
                <p class="pr-hero-sub">Ribuan hewan peliharaan menunggu untuk memberikan cinta tanpa syarat. Mulai perjalanan adopsi Anda hari ini.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="<?php echo e(route('catalog.index')); ?>" class="btn pr-btn-primary">Mulai Pencarian</a>
                    <a href="<?php echo e(route('education')); ?>" class="btn pr-btn-outline">Pelajari Lebih Lanjut</a>
                </div>
                <div class="pr-paw-mark mt-5"><i class="bi bi-suit-club-fill"></i></div>
            </div>
            <div class="col-lg-6">
                <div class="pr-hero-card">
                    <div class="pr-hero-circle">
                        <img src="<?php echo e(asset('attached_assets/pets-group.jpg')); ?>" alt="Hewan peliharaan PawRise">
                    </div>
                    <span class="pr-hero-pill pr-hero-pill--top"><i class="bi bi-heart-fill"></i></span>
                    <span class="pr-hero-pill pr-hero-pill--bottom"><i class="bi bi-house-fill"></i></span>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pr-section">
    <div class="container">
        <div class="pr-about-card">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-5">
                    <div class="pr-about-photo">
                        <img src="<?php echo e(asset('attached_assets/tentang-kami.png')); ?>" alt="Wanita memeluk anjing golden retriever">
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


<section class="pr-section" id="kontak">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="pr-section-title">Hubungi Kami</h2>
            <p class="pr-muted">Ada pertanyaan tentang proses adopsi atau ingin berkolaborasi? Kami siap mendengarkan.</p>
        </div>

        <?php if(session('success')): ?><div class="alert alert-success"><?php echo e(session('success')); ?></div><?php endif; ?>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="pr-contact-info">
                    <h4 class="fw-bold mb-4">Informasi Kontak</h4>
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
                        <img src="<?php echo e(asset('attached_assets/hubungi-kami.png')); ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="pr-contact-form">
                    <form method="POST" action="<?php echo e(route('contact.send')); ?>" class="row g-3">
                        <?php echo csrf_field(); ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Pawrise\resources\views/home/landing.blade.php ENDPATH**/ ?>