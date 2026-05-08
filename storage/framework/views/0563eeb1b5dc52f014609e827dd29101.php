<?php $__env->startSection('title', 'Konfirmasi Keluar - PawRise'); ?>
<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="pr-card p-5 text-center">
                <i class="bi bi-box-arrow-right" style="font-size: 60px; color: var(--pr-orange)"></i>
                <h3 class="fw-bold mt-3">Yakin ingin keluar?</h3>
                <p class="text-secondary">Anda akan keluar dari akun PawRise Anda.</p>
                <div class="d-flex gap-2 justify-content-center mt-4">
                    <a href="<?php echo e(route('user.profile')); ?>" class="btn btn-outline-secondary">Batal</a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?>
                        <button class="btn pr-btn-primary">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/user/logout.blade.php ENDPATH**/ ?>