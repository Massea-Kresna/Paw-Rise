<?php $__env->startSection('title', 'Dashboard - PawRise Shelter'); ?>
<?php $__env->startSection('content'); ?>

<style>
.dash-stat {
    background: #fff;
    border: 1px solid var(--pr-border);
    border-radius: 16px;
    padding: 20px 24px;
}
.dash-stat-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    margin-bottom: 10px;
}
.dash-stat-num {
    font-size: 2.5rem;
    font-weight: 800;
    line-height: 1;
    margin-bottom: 4px;
}
.dash-stat-label {
    font-size: .78rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .06em;
    color: var(--pr-text-muted);
}
.app-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid var(--pr-border);
}
.app-row:last-child { border-bottom: none; }
.app-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--pr-orange-light);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: .9rem;
    color: var(--pr-orange);
    flex-shrink: 0;
}
.animal-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid var(--pr-border);
}
.animal-row:last-child { border-bottom: none; }
.status-pill {
    padding: 3px 10px;
    border-radius: 999px;
    font-size: .75rem;
    font-weight: 700;
    white-space: nowrap;
}
.pill-tersedia  { background: #D1FAE5; color: #065F46; }
.pill-diproses  { background: #DBEAFE; color: #1E40AF; }
.pill-diadopsi  { background: #F3F4F6; color: #6B7280; }
.pill-menunggu  { background: #FEF3C7; color: #92400E; }
.pill-disetujui { background: #D1FAE5; color: #065F46; }
.pill-ditolak   { background: #FEE2E2; color: #991B1B; }
.performa-card {
    background: #fff;
    border: 1px solid var(--pr-border);
    border-radius: 16px;
    padding: 20px 24px;
    display: flex;
    align-items: center;
    gap: 24px;
    flex-wrap: wrap;
}
</style>

<?php
    $shelter      = auth()->user()->shelter;
    $totalAnimals = $shelter ? $shelter->animals()->count() : 0;
    $available    = $shelter ? $shelter->animals()->where('status','tersedia')->count() : 0;
    $process      = $shelter ? $shelter->animals()->where('status','diproses')->count() : 0;
    $adopted      = $shelter ? $shelter->animals()->where('status','diadopsi')->count() : 0;
?>


<div class="d-flex align-items-start justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h3 class="fw-bold mb-1">Selamat datang, <?php echo e($shelter->shelter_name ?? auth()->user()->name); ?></h3>
        <p class="mb-0" style="color: var(--pr-text-muted); font-size: .9rem;">
            Berikut adalah ringkasan aktivitas shelter Anda.
        </p>
    </div>
    <a href="<?php echo e(route('shelter.animals.create')); ?>"
       class="btn pr-btn-primary d-inline-flex align-items-center gap-2"
       style="border-radius: 12px; padding: 10px 20px;">
        <i class="bi bi-plus-lg"></i> Tambah Hewan Baru
    </a>
</div>


<div class="row g-3 mb-4">
    
    <div class="col-md-4">
        <div class="dash-stat text-center">
            <div class="dash-stat-icon" style="background: #FEF3C7; margin: 0 auto 12px;">
                <i class="bi bi-paw-fill" style="color: var(--pr-orange);"></i>
            </div>
            <div class="dash-stat-label">TOTAL HEWAN</div>
            <div class="dash-stat-num" style="color: var(--pr-text);"><?php echo e($totalAnimals); ?></div>
            <div style="font-size:.82rem; color: #16A34A; font-weight: 600; margin-top:4px;">
                <i class="bi bi-graph-up-arrow"></i> +<?php echo e($available); ?> masih tersedia
            </div>
        </div>
    </div>

    
    <div class="col-md-4">
        <div class="dash-stat text-center">
            <div class="dash-stat-icon" style="background: #DBEAFE; margin: 0 auto 12px;">
                <i class="bi bi-heart-fill" style="color: #3B82F6;"></i>
            </div>
            <div class="dash-stat-label">MENUNGGU ADOPSI</div>
            <div class="dash-stat-num" style="color: var(--pr-text);"><?php echo e($menungguCount); ?></div>
            <div style="font-size:.82rem; color: var(--pr-text-muted); margin-top:4px;">
                <?php echo e($menungguCount); ?> hewan siap adopsi baru
            </div>
        </div>
    </div>

    
    <div class="col-md-4">
        <div class="dash-stat text-center" style="border: 2px solid var(--pr-orange);">
            <div class="dash-stat-icon" style="background: var(--pr-orange); margin: 0 auto 12px;">
                <i class="bi bi-clipboard-fill" style="color:#fff;"></i>
            </div>
            <div class="dash-stat-label">PERMOHONAN BARU</div>
            <div class="dash-stat-num" style="color: var(--pr-text);"><?php echo e($newApps); ?></div>
            <div style="font-size:.82rem; color: var(--pr-orange); font-weight: 700; margin-top:4px;">
                Butuh respon segera
            </div>
        </div>
    </div>
</div>


<div class="row g-3 mb-4">

    
    <div class="col-lg-6">
        <div class="pr-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0">Permohonan Adopsi Terbaru</h6>
                <a href="<?php echo e(route('shelter.applications.index')); ?>"
                   style="font-size:.83rem; color:var(--pr-orange); font-weight:600; text-decoration:none;">
                    Lihat Semua
                </a>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $recentApps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="app-row">
                <div class="app-avatar"><?php echo e(strtoupper(substr($app->full_name, 0, 2))); ?></div>
                <div class="flex-grow-1">
                    <div class="fw-semibold" style="font-size:.88rem;"><?php echo e($app->full_name); ?></div>
                    <div style="font-size:.78rem; color:var(--pr-text-muted);">
                        Mengajukan adopsi untuk <strong><?php echo e($app->animal->name); ?></strong>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="status-pill pill-<?php echo e($app->status); ?>"><?php echo e(ucfirst($app->status)); ?></span>
                    <a href="<?php echo e(route('shelter.applications.show', $app)); ?>"
                       style="width:28px;height:28px;border-radius:8px;border:1px solid var(--pr-border);
                              display:flex;align-items:center;justify-content:center;
                              color:var(--pr-text-muted);text-decoration:none;font-size:.8rem;">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center py-3 mb-0" style="color:var(--pr-text-muted); font-size:.9rem;">
                Belum ada permohonan.
            </p>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="col-lg-6">
        <div class="pr-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0">Manajemen Hewan</h6>
                <a href="<?php echo e(route('shelter.animals.index')); ?>"
                   style="font-size:.83rem; color:var(--pr-text-muted); text-decoration:none;">
                    <i class="bi bi-three-dots"></i>
                </a>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="animal-row">
                <img src="<?php echo e($animal->mainPhotoUrl()); ?>" alt=""
                     style="width:40px;height:40px;border-radius:10px;object-fit:cover;flex-shrink:0;">
                <div class="flex-grow-1">
                    <div class="fw-semibold" style="font-size:.88rem;"><?php echo e($animal->name); ?></div>
                    <div style="font-size:.78rem; color:var(--pr-text-muted);">
                        <?php echo e(ucfirst($animal->species)); ?> • <?php echo e($animal->ageLabel()); ?>

                    </div>
                </div>
                <span class="status-pill pill-<?php echo e($animal->status); ?>"><?php echo e(ucfirst($animal->status)); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center py-3 mb-0" style="color:var(--pr-text-muted); font-size:.9rem;">
                Belum ada hewan terdaftar.
            </p>
            <?php endif; ?>

            <a href="<?php echo e(route('shelter.animals.index')); ?>"
               class="btn w-100 mt-3"
               style="border-radius:10px;border:1px solid var(--pr-border);font-size:.85rem;
                      color:var(--pr-text-muted);font-weight:600;padding:8px;">
                Kelola Database Hewan
            </a>
        </div>
    </div>
</div>


<div class="performa-card">
    <div style="width:44px;height:44px;border-radius:12px;background:#FEF3C7;
                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <i class="bi bi-graph-up-arrow" style="color:var(--pr-orange);font-size:1.2rem;"></i>
    </div>
    <div class="flex-grow-1">
        <div class="fw-bold mb-1" style="font-size:.95rem;">Performa Shelter Bulan Ini</div>
        <div style="font-size:.83rem; color:var(--pr-text-muted);">
            Shelter Anda telah menyelesaikan <?php echo e($adopted); ?> adopsi. Terus pertahankan dalam 90 hari ke depan.
        </div>
    </div>
    <div class="d-flex gap-4 flex-shrink-0">
        <div class="text-center">
            <div class="fw-bold" style="font-size:1.3rem; color:var(--pr-orange);">92%</div>
            <div style="font-size:.72rem;color:var(--pr-text-muted);font-weight:600;text-transform:uppercase;">Respon Rate</div>
        </div>
        <div class="text-center">
            <div class="fw-bold" style="font-size:1.3rem; color:var(--pr-orange);">4.5 Hari</div>
            <div style="font-size:.72rem;color:var(--pr-text-muted);font-weight:600;text-transform:uppercase;">Avg. Proses</div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.shelter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/shelter/dashboard.blade.php ENDPATH**/ ?>