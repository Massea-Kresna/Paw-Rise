<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('partials.navbar-shelter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   <main class="container py-4" style="min-height: calc(100vh - 80px);">
        <div class="row g-4">
            <aside class="col-lg-3">
                <?php echo $__env->make('partials.sidebar-shelter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </aside>
            <section class="col-lg-9">
                <?php echo $__env->yieldContent('content'); ?>
            </section>
        </div>
    </main>
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/layouts/shelter.blade.php ENDPATH**/ ?>