<?php $__env->startSection('title', 'Profil Saya - PawRise'); ?>
<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-3"><?php echo $__env->make('partials.sidebar-user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></div>
        <div class="col-lg-9">
            <div class="pr-card p-4 p-md-5">
                <h3 class="fw-bold mb-4">Profil Saya</h3>
                <?php if(session('success')): ?><div class="alert alert-success"><?php echo e(session('success')); ?></div><?php endif; ?>
                <?php if($errors->any()): ?><div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>

                <form method="POST" action="<?php echo e(route('user.profile.update')); ?>" enctype="multipart/form-data" class="row g-3">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-3 text-center">
                        <img src="<?php echo e(auth()->user()->profilePhotoUrl()); ?>" alt="" class="rounded-circle mb-2" style="width:120px; height:120px; object-fit:cover;">
                        <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
                    </div>
                    <div class="col-md-9">
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label">Nama Lengkap</label><input type="text" name="name" value="<?php echo e(old('name', auth()->user()->name)); ?>" class="form-control" required></div>
                            <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" value="<?php echo e(old('email', auth()->user()->email)); ?>" class="form-control" required></div>
                            <div class="col-md-6"><label class="form-label">No. Telepon</label><input type="text" name="phone" value="<?php echo e(old('phone', auth()->user()->phone)); ?>" class="form-control"></div>
                            <div class="col-12"><label class="form-label">Alamat</label><textarea name="address" rows="2" class="form-control"><?php echo e(old('address', auth()->user()->address)); ?></textarea></div>
                            <div class="col-12"><label class="form-label">Tentang Saya</label><textarea name="bio" rows="3" class="form-control"><?php echo e(old('bio', auth()->user()->bio)); ?></textarea></div>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn pr-btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/user/profile.blade.php ENDPATH**/ ?>