<?php $__env->startSection('title', 'Keluar - PawRise'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex align-items-center justify-content-center" style="min-height: 60vh;">
    <div class="text-center p-5"
         style="background: #fff; border: 1px solid var(--pr-border); border-radius: 20px; width: 100%; max-width: 340px;">

        
        <div style="width: 72px; height: 72px; border-radius: 50%; background: var(--pr-orange-light);
                    display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
            <i class="bi bi-paw-fill" style="font-size: 2rem; color: var(--pr-orange);"></i>
        </div>

        <h4 class="fw-bold mb-2">Keluar dari PawRise?</h4>
        <p style="color: var(--pr-text-muted); font-size: .9rem; line-height: 1.6;">
            Apakah Anda yakin ingin keluar? Kami akan merindukan Anda dan teman-teman berbulu di sini.
        </p>

        <div class="d-flex flex-column gap-2 mt-4">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"
                        class="btn pr-btn-primary w-100"
                        style="border-radius: 12px; padding: 12px; font-size: .95rem;">
                    Ya, Keluar
                </button>
            </form>

            <a href="<?php echo e(route('user.profile')); ?>"
               class="btn w-100"
               style="border-radius: 12px; padding: 12px; font-size: .95rem;
                      border: 1.5px solid var(--pr-border); color: var(--pr-text-muted); font-weight: 600;">
                Batal
            </a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/user/logout.blade.php ENDPATH**/ ?>