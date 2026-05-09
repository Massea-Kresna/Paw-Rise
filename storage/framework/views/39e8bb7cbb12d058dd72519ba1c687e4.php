<?php $__env->startSection('title', 'Status Adopsi - PawRise'); ?>
<?php $__env->startSection('content'); ?>

<style>
    .app-card {
        background: #fff;
        border: 1px solid var(--pr-border);
        border-radius: 16px;
        padding: 16px;
        display: flex;
        gap: 16px;
        align-items: flex-start;
    }

    .app-card-img {
        width: 110px;
        height: 90px;
        object-fit: cover;
        border-radius: 12px;
        flex-shrink: 0;
    }

    .app-status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: .78rem;
        font-weight: 700;
    }

    .badge-disetujui {
        background: #D1FAE5;
        color: #065F46;
    }

    .badge-menunggu {
        background: #92400E;
        color: #fff;
    }

    .badge-ditolak {
        background: #991B1B;
        color: #fff;
    }
</style>

<h3 class="fw-bold mb-1">Status Adopsi</h3>
<p class="mb-4" style="color: var(--pr-text-muted); font-size: .92rem;">
    Pantau perkembangan pengajuan adopsi Anda secara real-time.
</p>

<?php if(session('success')): ?>
<div class="alert alert-success mb-4"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<?php if($apps->count()): ?>
<div class="d-flex flex-column gap-3">
    <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="app-card">

        
        <img src="<?php echo e($app->animal->mainPhotoUrl()); ?>"
            alt="<?php echo e($app->animal->name); ?>"
            class="app-card-img">

        
        <div class="flex-grow-1 min-width-0">
            <div class="d-flex align-items-start justify-content-between gap-2 mb-1 flex-wrap">
                <div>
                    <h6 class="fw-bold mb-0"><?php echo e($app->animal->name); ?></h6>
                    <div style="font-size:.82rem; color: var(--pr-text-muted);">
                        <?php echo e(ucfirst($app->animal->species)); ?> •
                        <?php echo e($app->animal->breed); ?> •
                        <?php echo e($app->animal->shelter->shelter_name ?? ''); ?>

                        <?php if($app->animal->shelter?->city): ?>, <?php echo e($app->animal->shelter->city); ?><?php endif; ?>
                    </div>
                </div>
                
                <span class="app-status-badge
                        <?php if($app->status === 'disetujui'): ?> badge-disetujui
                        <?php elseif($app->status === 'ditolak'): ?> badge-ditolak
                        <?php else: ?> badge-menunggu
                        <?php endif; ?>">
                    <?php if($app->status === 'disetujui'): ?> ✓ Disetujui
                    <?php elseif($app->status === 'ditolak'): ?> ✕ Ditolak
                    <?php else: ?> ⏳ Menunggu
                    <?php endif; ?>
                </span>
            </div>

            
            <div class="p-2 rounded-2 mb-3 mt-2"
                style="background: var(--pr-bg); font-size: .83rem; color: var(--pr-text-muted); line-height: 1.55;">
                <span class="fw-semibold" style="color: var(--pr-text);">Pembaruan Terakhir:</span>
                <?php if($app->status === 'disetujui'): ?>
                Pengajuan Anda telah disetujui oleh shelter. Silakan jadwalkan penjemputan.
                <?php elseif($app->status === 'ditolak'): ?>
                Sayangnya pengajuan Anda tidak dapat diizinkan saat ini karena lingkungan tempat tinggal tidak memenuhi kriteria khusus <?php echo e($app->animal->name); ?>.
                <?php else: ?>
                Dokumen sedang ditinjau. Tim kami akan menghubungi Anda dalam 1-2 hari kerja untuk wawancara singkat.
                <?php endif; ?>
            </div>

            
            <?php if($app->status === 'disetujui'): ?>
            <a href="<?php echo e(route('animals.show', $app->animal)); ?>"
                class="btn btn-sm pr-btn-primary"
                style="border-radius: 10px; font-size: .85rem; padding: 6px 18px;">
                Langkah Selanjutnya
            </a>
            <?php elseif($app->status === 'ditolak'): ?>
            <a href="<?php echo e(route('catalog.index')); ?>"
                class="btn btn-sm pr-btn-primary"
                style="border-radius: 10px; font-size: .85rem; padding: 6px 18px;">
                Lihat Hewan Lain
            </a>
            <?php else: ?>
            <a href="<?php echo e(route('animals.show', $app->animal)); ?>"
                class="btn btn-sm pr-btn-primary"
                style="border-radius: 10px; font-size: .85rem; padding: 6px 18px;">
                Cek Detail
            </a>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php if($apps->hasPages()): ?>
<nav class="pr-pagination mt-4" aria-label="Pagination">
    <ul>
        <li class="<?php echo e($apps->onFirstPage() ? 'disabled' : ''); ?>">
            <a href="<?php echo e($apps->previousPageUrl() ?? '#'); ?>">
                <i class="bi bi-chevron-left"></i>
            </a>
        </li>
        <?php for($i = 1; $i <= $apps->lastPage(); $i++): ?>
            <li class="<?php echo e($apps->currentPage() === $i ? 'active' : ''); ?>">
                <a href="<?php echo e($apps->url($i)); ?>"><?php echo e($i); ?></a>
            </li>
            <?php endfor; ?>
            <li class="<?php echo e(!$apps->hasMorePages() ? 'disabled' : ''); ?>">
                <a href="<?php echo e($apps->nextPageUrl() ?? '#'); ?>">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
    </ul>
</nav>
<?php endif; ?>

<?php else: ?>

<div class="text-center py-5" style="border: 1px solid var(--pr-border); border-radius: 16px; background: #fff;">
    <div style="font-size: 3rem; color: var(--pr-orange-light);">
        <i class="bi bi-clipboard-check"></i>
    </div>
    <h6 class="fw-bold mt-3 mb-1">Belum ada permohonan adopsi</h6>
    <p style="color: var(--pr-text-muted); font-size: .9rem;" class="mb-3">
        Temukan hewan yang cocok dan mulai proses adopsimu.
    </p>
    <a href="<?php echo e(route('catalog.index')); ?>"
        class="btn pr-btn-primary"
        style="border-radius: 12px; padding: 10px 24px;">
        Lihat Katalog Hewan
    </a>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/user/applications.blade.php ENDPATH**/ ?>