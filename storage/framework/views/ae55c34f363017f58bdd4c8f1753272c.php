<?php $__env->startSection('title', 'Kelola Hewan - PawRise Shelter'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold mb-0">Kelola Hewan</h3>
    <a href="<?php echo e(route('shelter.animals.create')); ?>" class="btn pr-btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Hewan
    </a>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<form method="GET" class="pr-card p-3 mb-3 d-flex gap-2 flex-wrap">
    <input name="q" value="<?php echo e(request('q')); ?>" class="form-control form-control-sm flex-grow-1" placeholder="Cari nama atau ras...">
    <select name="species" class="form-select form-select-sm" style="max-width: 160px;">
        <option value="">Semua jenis</option>
        <?php $__currentLoopData = ['anjing','kucing','lainnya']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($sp); ?>" <?php echo e(request('species') == $sp ? 'selected' : ''); ?>><?php echo e(ucfirst($sp)); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <select name="status" class="form-select form-select-sm" style="max-width: 160px;">
        <option value="">Semua status</option>
        <?php $__currentLoopData = ['tersedia','diproses','diadopsi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($st); ?>" <?php echo e(request('status') == $st ? 'selected' : ''); ?>><?php echo e(ucfirst($st)); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button class="btn pr-btn-primary btn-sm">Filter</button>
</form>

<div class="pr-card p-0">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr><th>Foto</th><th>Nama</th><th>Jenis</th><th>Usia</th><th>Status</th><th class="text-end">Aksi</th></tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><img src="<?php echo e($animal->mainPhotoUrl()); ?>" alt="" style="width:48px; height:48px; object-fit:cover; border-radius:8px;"></td>
                    <td><strong><?php echo e($animal->name); ?></strong><br><small class="text-secondary"><?php echo e($animal->breed); ?></small></td>
                    <td><?php echo e(ucfirst($animal->species)); ?></td>
                    <td><?php echo e($animal->ageLabel()); ?></td>
                    <td><span class="badge bg-secondary"><?php echo e(ucfirst($animal->status)); ?></span></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('shelter.animals.edit', $animal)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="<?php echo e(route('shelter.animals.destroy', $animal)); ?>" class="d-inline" onsubmit="return confirm('Hapus data hewan ini?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="6" class="text-center text-secondary py-4">Belum ada hewan terdaftar.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3"><?php echo e($animals->links()); ?></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.shelter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/shelter/animals/index.blade.php ENDPATH**/ ?>