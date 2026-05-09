<?php $__env->startSection('title', 'Hewan Disukai - PawRise'); ?>
<?php $__env->startSection('content'); ?>

<h3 class="fw-bold mb-4">Hewan Disukai</h3>

<?php if($animals->count()): ?>
    <div class="row g-3">
        <?php $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-xl-4">
                <?php echo $__env->make('partials.animal-card', ['animal' => $animal], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="mt-4"><?php echo e($animals->links()); ?></div>
<?php else: ?>
    <div class="pr-card p-5 text-center">
        <i class="bi bi-heart" style="font-size: 60px; color: var(--pr-orange-light)"></i>
        <p class="text-secondary mt-3">Belum ada hewan favorit.</p>
        <a href="<?php echo e(route('catalog.index')); ?>" class="btn pr-btn-primary mt-2">Cari Hewan</a>
    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/user/favorites.blade.php ENDPATH**/ ?>