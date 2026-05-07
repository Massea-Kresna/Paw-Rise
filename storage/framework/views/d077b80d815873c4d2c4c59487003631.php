<?php $__env->startSection('title', 'Masuk - PawRise'); ?>
<?php $__env->startSection('content'); ?>
<div class="pr-auth-card">
    <h2 class="fw-bold mb-2">Selamat Datang Kembali</h2>
    <p class="text-secondary mb-4">Masuk untuk melanjutkan perjalanan adopsi Anda.</p>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger"><?php echo e($errors->first()); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('login.store')); ?>" class="d-grid gap-3">
        <?php echo csrf_field(); ?>
        <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="nama@email.com" required autofocus>
        </div>
        <div>
            <label class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
            <a href="#" class="text-decoration-none" style="color: var(--pr-orange);">Lupa Kata Sandi?</a>
        </div>
        <button type="submit" class="btn pr-btn-primary btn-lg">Masuk</button>
    </form>

    <p class="text-center mt-4 mb-0">
        Belum punya akun?
        <a href="<?php echo e(route('register')); ?>" class="text-decoration-none fw-semibold" style="color: var(--pr-orange);">Daftar Sekarang</a>
    </p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/auth/login.blade.php ENDPATH**/ ?>