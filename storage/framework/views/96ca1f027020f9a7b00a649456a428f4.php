<?php $__env->startSection('body'); ?>
<div class="pr-auth">
    <div class="pr-auth-left" style="background-image: linear-gradient(rgba(240,140,42,.65), rgba(240,140,42,.65)), url('<?php echo e($heroImage ?? "https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=1200"); ?>');">
        <div class="text-center" style="max-width: 460px;">
            <h1 class="mb-3"><?php echo $__env->yieldContent('hero_title', 'Selamat Datang!'); ?></h1>
            <p class="lead opacity-75"><?php echo $__env->yieldContent('hero_subtitle', 'Mulai perjalanan mencari teman selamanya'); ?></p>
        </div>
    </div>
    <div class="pr-auth-right">
        <div class="pr-auth-card">
            <div class="text-center mb-3">
                <a href="<?php echo e(route('home')); ?>" class="pr-brand"><i class="bi bi-suit-heart-fill"></i> PawRise</a>
                <p class="text-muted mb-0 mt-1 small"><?php echo $__env->yieldContent('subtitle', 'Buat akun untuk memulai perjalanan Anda'); ?></p>
            </div>
            <div class="pr-auth-tabs">
                <a href="<?php echo e(route('login')); ?>" class="<?php echo $__env->yieldContent('tab_login_class', ''); ?>">Masuk</a>
                <a href="<?php echo e(route('register')); ?>" class="<?php echo $__env->yieldContent('tab_register_class', ''); ?>">Daftar</a>
            </div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/layouts/auth.blade.php ENDPATH**/ ?>