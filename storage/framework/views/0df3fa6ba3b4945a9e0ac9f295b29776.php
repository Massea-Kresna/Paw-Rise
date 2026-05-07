<?php $__env->startSection('title', $animal->name . ' - PawRise'); ?>
<?php $__env->startSection('content'); ?>

<style>
.detail-photo-main {
    width: 100%;
    aspect-ratio: 4 / 3.5;
    object-fit: cover;
    border-radius: 18px;
    display: block;
    cursor: zoom-in;
}
.detail-thumb {
    width: 88px;
    height: 66px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    border: 2.5px solid transparent;
    transition: border-color .15s;
    display: block;
}
.detail-thumb.active,
.detail-thumb:hover {
    border-color: var(--pr-orange);
}
.stat-card {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    border-radius: 14px;
    background: var(--pr-bg);
    border: 1px solid var(--pr-border);
    height: 100%;
}
.stat-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 1rem;
}
.stat-label {
    font-size: .68rem;
    text-transform: uppercase;
    letter-spacing: .07em;
    font-weight: 700;
    color: var(--pr-text-muted);
    margin-bottom: 2px;
}
.stat-value {
    font-weight: 700;
    font-size: .95rem;
    color: var(--pr-text);
    line-height: 1.2;
}
.cta-box {
    max-width: 500px;
    margin-left: auto;
    border: 1px solid var(--pr-border);
    border-radius: 16px;
    padding: 20px;
    background: #fff;
}
.shelter-card {
    max-width: 500px;
    margin-left: auto;
    border: 1px solid var(--pr-border);
    border-radius: 16px;
    padding: 20px;
    background: #fff;
}
.trait-tag {
    display: inline-block;
    padding: 5px 14px;
    border-radius: 999px;
    background: var(--pr-orange-light);
    color: var(--pr-orange-dark);
    font-size: .85rem;
    font-weight: 500;
}
.medis-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 6px 0;
    font-size: .95rem;
}
</style>

<div class="container py-4" style="max-width: 1080px;">

    
    <a href="<?php echo e(route('catalog.index')); ?>"
       class="d-inline-flex align-items-center gap-2 mb-4 text-decoration-none fw-semibold"
       style="color: var(--pr-text-muted); font-size: .88rem;">
        <i class="bi bi-arrow-left"></i> Kembali ke Katalog
    </a>

    
    <div class="row g-4 align-items-start mb-5">

        
        <div class="col-lg-5">
            <img id="mainPhoto"
                 src="<?php echo e($animal->mainPhotoUrl()); ?>"
                 alt="<?php echo e($animal->name); ?>"
                 class="detail-photo-main mb-3"
                 onclick="openLightbox(this.src)">

            <?php if($animal->photos->count()): ?>
            <div class="d-flex gap-2 flex-wrap">
                <img src="<?php echo e($animal->mainPhotoUrl()); ?>"
                     class="detail-thumb active"
                     alt=""
                     onclick="switchPhoto(this)">
                <?php $__currentLoopData = $animal->photos->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('storage/' . $photo->photo_path)); ?>"
                         class="detail-thumb"
                         alt=""
                         onclick="switchPhoto(this)">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($animal->photos->count() > 3): ?>
                <div style="width:88px;height:66px;border-radius:10px;overflow:hidden;position:relative;cursor:pointer;">
                    <img src="<?php echo e(asset('storage/' . $animal->photos->get(3)->photo_path)); ?>"
                         style="width:100%;height:100%;object-fit:cover;opacity:.45;" alt="">
                    <span style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;
                                 color:#fff;font-weight:700;font-size:1.1rem;background:rgba(0,0,0,.25);">
                        +<?php echo e($animal->photos->count() - 3); ?>

                    </span>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>

        
        <div class="col-lg-7">

            
            <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                <span style="background:#D1FAE5;color:#065F46;border-radius:999px;
                             font-size:.78rem;font-weight:700;padding:4px 12px;">
                    <?php echo e($animal->speciesLabel()); ?>

                </span>
                <span style="color:var(--pr-text-muted);font-size:.87rem;">
                    <i class="bi bi-geo-alt"></i>
                    <?php echo e($animal->shelter->shelter_name ?? '—'); ?><?php if($animal->shelter?->city): ?>, <?php echo e($animal->shelter->city); ?><?php endif; ?>
                </span>
            </div>

            <h1 class="fw-bold mb-0" style="font-size:2.2rem;line-height:1.1;"><?php echo e($animal->name); ?></h1>
            <p class="mb-3" style="color:var(--pr-text-muted);font-size:1rem;margin-top:4px;"><?php echo e($animal->breed); ?></p>

            
            <div class="row g-2 mb-3">
                <div class="col-6">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#E0F2FE;">
                            <i class="bi bi-calendar3" style="color:#0369A1;"></i>
                        </div>
                        <div>
                            <div class="stat-label">Umur</div>
                            <div class="stat-value"><?php echo e($animal->ageLabel()); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#FEF3C7;">
                            <i class="bi bi-arrows-expand-vertical" style="color:#B45309;"></i>
                        </div>
                        <div>
                            <div class="stat-label">Berat</div>
                            <div class="stat-value"><?php echo e($animal->weight_kg ?? '—'); ?> kg</div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#FCE7F3;">
                            <i class="bi bi-gender-<?php echo e($animal->gender === 'betina' ? 'female' : 'male'); ?>"
                               style="color:#9D174D;"></i>
                        </div>
                        <div>
                            <div class="stat-label">Gender</div>
                            <div class="stat-value"><?php echo e(ucfirst($animal->gender)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#D1FAE5;">
                            <i class="bi bi-shield-check" style="color:#065F46;"></i>
                        </div>
                        <div>
                            <div class="stat-label">Vaksinasi</div>
                            <div class="stat-value"
                                 style="color:<?php echo e($animal->vaccinated ? 'var(--pr-success)' : 'var(--pr-text-muted)'); ?>;">
                                <?php echo e($animal->vaccinated ? 'Lengkap' : 'Belum'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <?php if($animal->characteristics): ?>
            <h6 class="fw-bold mb-2" style="font-size:.95rem;">Sifat & Karakter</h6>
            <div class="d-flex flex-wrap gap-2 mb-3">
                <?php $__currentLoopData = $animal->characteristicsArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trait): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="trait-tag"><?php echo e($trait); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            
            <div class="cta-box mb-3">
                <p class="text-center mb-3" style="color:var(--pr-text-muted);font-size:.88rem;">
                    Siap memberikan rumah yang hangat untuk <?php echo e($animal->name); ?>?
                </p>

                <?php if($animal->status === 'tersedia'): ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->isAdopter()): ?>
                            <a href="<?php echo e(route('adoption.create', $animal)); ?>"
                               class="btn pr-btn-primary w-100 mb-2 d-flex align-items-center justify-content-center gap-2"
                               style="border-radius:12px;padding:13px;font-size:.97rem;">
                                <i class="bi bi-heart-fill"></i> Ajukan Adopsi
                            </a>
                        <?php else: ?>
                            <button class="btn w-100 mb-2" disabled
                                    style="border-radius:12px;padding:13px;background:#f3f4f6;color:#9ca3af;font-weight:600;">
                                Login sebagai adopter untuk mengadopsi
                            </button>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"
                           class="btn pr-btn-primary w-100 mb-2 d-flex align-items-center justify-content-center gap-2"
                           style="border-radius:12px;padding:13px;font-size:.97rem;">
                            <i class="bi bi-heart-fill"></i> Masuk untuk Mengadopsi
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <button class="btn w-100 mb-2" disabled
                            style="border-radius:12px;padding:13px;background:#f3f4f6;color:#9ca3af;font-weight:600;">
                        Tidak Tersedia
                    </button>
                <?php endif; ?>

                <div class="d-flex gap-2">
                    <?php $wa = $animal->shelter?->whatsapp ? preg_replace('/[^0-9]/', '', $animal->shelter->whatsapp) : null; ?>
                    <?php if($wa): ?>
                        <a href="https://wa.me/<?php echo e($wa); ?>?text=<?php echo e(urlencode('Halo, saya ingin bertanya tentang ' . $animal->name)); ?>"
                           target="_blank"
                           class="btn flex-grow-1 fw-semibold"
                           style="border:1.5px solid var(--pr-orange);color:var(--pr-orange);border-radius:12px;padding:10px;">
                            Tanya Shelter
                        </a>
                    <?php else: ?>
                        <button class="btn flex-grow-1 fw-semibold"
                                style="border:1.5px solid var(--pr-orange);color:var(--pr-orange);border-radius:12px;padding:10px;">
                            Tanya Shelter
                        </button>
                    <?php endif; ?>
                    <button onclick="shareAnimal()"
                            class="btn"
                            style="border:1.5px solid var(--pr-border);border-radius:12px;padding:10px 14px;color:var(--pr-text-muted);"
                            title="Bagikan">
                        <i class="bi bi-share"></i>
                    </button>
                </div>
            </div>

            
            <div class="shelter-card">
                <h6 class="fw-bold mb-3">Shelter Terkait</h6>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div style="width:50px;height:50px;border-radius:50%;background:var(--pr-orange-light);
                                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="bi bi-house-heart-fill" style="color:var(--pr-orange);font-size:1.2rem;"></i>
                    </div>
                    <div>
                        <div class="fw-bold"><?php echo e($animal->shelter->shelter_name ?? '—'); ?></div>
                        <div style="font-size:.82rem;color:var(--pr-text-muted);"><?php echo e($animal->shelter->city ?? ''); ?></div>
                    </div>
                </div>
                <p style="font-size:.86rem;color:var(--pr-text-muted);line-height:1.65;margin-bottom:14px;">
                    <?php echo e($animal->shelter->description ?? 'Shelter ini berdedikasi untuk menyelamatkan dan merawat hewan terlantar di area ' . ($animal->shelter->city ?? 'Indonesia') . '.'); ?>

                </p>
                <a href="#" class="text-decoration-none fw-semibold" style="color:var(--pr-orange);font-size:.88rem;">
                    Lihat Profil Shelter →
                </a>
            </div>

        </div>
        

    </div>
    

    
<div class="row g-4 mb-5">

    
    <div class="col-lg-5">
        <h3 class="fw-bold mb-3">Tentang <?php echo e($animal->name); ?></h3>
        <p style="color:var(--pr-text-muted);line-height:1.8;font-size:.96rem;">
            <?php echo e($animal->description ?? 'Belum ada deskripsi.'); ?>

        </p>

        <?php if($animal->medical_history): ?>
        <h5 class="fw-bold mt-4 mb-3">Riwayat Medis</h5>
        <?php $__currentLoopData = array_filter(array_map('trim', explode("\n", $animal->medical_history))); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="medis-item">
                <i class="bi bi-check-circle-fill mt-1 flex-shrink-0" style="color:var(--pr-success);"></i>
                <span><?php echo e($item); ?></span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>

</div>

    
    <?php if($similar->count()): ?>
    <h3 class="fw-bold mb-4">Hewan Serupa</h3>
    <div class="row g-3">
        <?php $__currentLoopData = $similar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-md-3">
                <?php echo $__env->make('partials.animal-card', ['animal' => $a], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>

</div>


<div id="lightbox" onclick="closeLightbox()"
     style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.88);
            z-index:9999;align-items:center;justify-content:center;cursor:zoom-out;">
    <img id="lightboxImg" src="" alt=""
         style="max-width:90vw;max-height:90vh;border-radius:12px;box-shadow:0 20px 60px rgba(0,0,0,.5);">
</div>

<script>
function switchPhoto(el) {
    document.getElementById('mainPhoto').src = el.src;
    document.querySelectorAll('.detail-thumb').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
}
function openLightbox(src) {
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightbox').style.display = 'flex';
}
function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
function shareAnimal() {
    if (navigator.share) {
        navigator.share({ title: '<?php echo e($animal->name); ?> - PawRise', url: window.location.href });
    } else {
        navigator.clipboard.writeText(window.location.href).then(() => alert('Link disalin!'));
    }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/animals/show.blade.php ENDPATH**/ ?>