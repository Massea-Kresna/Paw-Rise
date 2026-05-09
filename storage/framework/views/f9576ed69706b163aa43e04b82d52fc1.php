<?php $__env->startSection('title', 'Tambah Hewan - PawRise Shelter'); ?>
<?php $__env->startSection('content'); ?>

<h3 class="fw-bold mb-3">Tambah Hewan Baru</h3>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($e); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('shelter.animals.store')); ?>" enctype="multipart/form-data" class="pr-card p-4">
    <?php echo $__env->make('shelter.animals._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="text-end mt-4">
        <a href="<?php echo e(route('shelter.animals.index')); ?>" class="btn btn-outline-secondary">Batal</a>
        <button type="submit" class="btn pr-btn-primary">Simpan</button>
    </div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.shelter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/shelter/animals/create.blade.php ENDPATH**/ ?>