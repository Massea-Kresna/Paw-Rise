<?php $__env->startSection('title', 'Daftar - PawRise'); ?>
<?php $__env->startSection('content'); ?>
<div class="pr-auth-card">
    <h2 class="fw-bold mb-2">Daftar Akun</h2>
    <p class="text-secondary mb-4">Bergabunglah dengan keluarga PawRise.</p>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('register.store')); ?>" class="d-grid gap-3">
        <?php echo csrf_field(); ?>
        <div class="btn-group w-100" role="group">
            <input type="radio" class="btn-check" name="role" id="role-adopter" value="adopter" <?php echo e(old('role','adopter') === 'adopter' ? 'checked' : ''); ?> onchange="document.getElementById('shelter-fields').style.display='none'">
            <label class="btn btn-outline-warning" for="role-adopter">Saya Calon Adopter</label>

            <input type="radio" class="btn-check" name="role" id="role-shelter" value="shelter" <?php echo e(old('role') === 'shelter' ? 'checked' : ''); ?> onchange="document.getElementById('shelter-fields').style.display='block'">
            <label class="btn btn-outline-warning" for="role-shelter">Saya Shelter</label>
        </div>

        <div>
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" required>
        </div>
        <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" required>
        </div>
        <div>
            <label class="form-label">No. Telepon</label>
            <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control" placeholder="08xxxxxxxxxx" required>
        </div>

        <div id="shelter-fields" style="display: <?php echo e(old('role') === 'shelter' ? 'block' : 'none'); ?>;">
            <div class="mb-3">
                <label class="form-label">Nama Shelter</label>
                <input type="text" name="shelter_name" value="<?php echo e(old('shelter_name')); ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Kota</label>
                <input type="text" name="city" value="<?php echo e(old('city')); ?>" class="form-control">
            </div>
        </div>

        <div>
            <label class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div>
            <label class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn pr-btn-primary btn-lg">Daftar Sekarang</button>
    </form>

    <p class="text-center mt-4 mb-0">
        Sudah punya akun?
        <a href="<?php echo e(route('login')); ?>" class="text-decoration-none fw-semibold" style="color: var(--pr-orange);">Masuk</a>
    </p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/auth/register.blade.php ENDPATH**/ ?>