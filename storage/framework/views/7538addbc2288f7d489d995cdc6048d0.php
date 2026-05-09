<?php $__env->startSection('title', 'Permohonan - PawRise Shelter'); ?>
<?php $__env->startSection('content'); ?>

<style>
.app-table th {
    font-size: .78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .06em;
    color: var(--pr-text-muted);
    padding: 12px 16px;
    border-bottom: 1px solid var(--pr-border);
    background: #fff;
}
.app-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--pr-border);
    vertical-align: middle;
}
.app-table tbody tr:last-child td { border-bottom: none; }
.app-table tbody tr:hover { background: var(--pr-bg); }
.user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--pr-orange-light);
    color: var(--pr-orange);
    font-weight: 700;
    font-size: .85rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.status-pill {
    padding: 4px 12px;
    border-radius: 999px;
    font-size: .75rem;
    font-weight: 700;
}
.pill-menunggu  { background: #FEF3C7; color: #92400E; }
.pill-disetujui { background: #D1FAE5; color: #065F46; }
.pill-ditolak   { background: #FEE2E2; color: #991B1B; }
</style>


<div class="d-flex align-items-start justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h3 class="fw-bold mb-1">Permohonan Adopsi</h3>
        <p class="mb-0" style="color: var(--pr-text-muted); font-size: .9rem;">
            Kelola dan tinjau pengajuan adopsi dari calon adopter.
        </p>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success mb-3"><?php echo e(session('success')); ?></div>
<?php endif; ?>


<div class="pr-card p-3 mb-3">
    <form method="GET" class="d-flex align-items-center gap-2 flex-wrap">
        <select name="status"
                class="form-select form-select-sm"
                style="max-width: 180px; border-radius: 10px;">
            <option value="">Semua status</option>
            <?php $__currentLoopData = ['menunggu','disetujui','ditolak']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($st); ?>" <?php echo e(request('status') == $st ? 'selected' : ''); ?>>
                    <?php echo e(ucfirst($st)); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button class="btn pr-btn-primary btn-sm" style="border-radius: 999px; padding: 6px 20px;">
            Filter
        </button>
    </form>
</div>


<div class="pr-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table app-table mb-0">
            <thead>
                <tr>
                    <th>Nama Pemohon</th>
                    <th>Hewan Diajukan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="user-avatar">
                                <?php echo e(strtoupper(substr($app->full_name, 0, 2))); ?>

                            </div>
                            <div>
                                <div class="fw-semibold" style="font-size: .9rem;"><?php echo e($app->full_name); ?></div>
                                <div style="font-size: .78rem; color: var(--pr-text-muted);"><?php echo e($app->whatsapp); ?></div>
                            </div>
                        </div>
                    </td>

                    
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="<?php echo e($app->animal->mainPhotoUrl()); ?>" alt=""
                                 style="width:40px; height:40px; border-radius:10px; object-fit:cover; flex-shrink:0;">
                            <div>
                                <div class="fw-semibold" style="font-size: .9rem;"><?php echo e($app->animal->name); ?></div>
                                <div style="font-size: .78rem; color: var(--pr-text-muted);">
                                    <?php echo e(ucfirst($app->animal->species)); ?> • <?php echo e($app->animal->ageLabel()); ?>

                                </div>
                            </div>
                        </div>
                    </td>

                    
                    <td style="font-size: .87rem; color: var(--pr-text-muted);">
                        <?php echo e($app->created_at->format('d M Y')); ?><br>
                        <small><?php echo e($app->created_at->format('H:i')); ?></small>
                    </td>

                    
                    <td>
                        <span class="status-pill pill-<?php echo e($app->status); ?>">
                            <?php echo e(ucfirst($app->status)); ?>

                        </span>
                    </td>

                    
                    <td class="text-end">
                        <a href="<?php echo e(route('shelter.applications.show', $app)); ?>"
                           class="btn btn-sm pr-btn-primary"
                           style="border-radius: 999px; font-size: .82rem; padding: 5px 16px;">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center py-5" style="color: var(--pr-text-muted);">
                        <i class="bi bi-clipboard-x" style="font-size: 2.5rem; display:block; margin-bottom:10px; opacity:.4;"></i>
                        Belum ada permohonan.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<?php if($apps->hasPages()): ?>
    <div class="mt-3"><?php echo e($apps->links()); ?></div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.shelter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/shelter/applications/index.blade.php ENDPATH**/ ?>