<div class="pr-sidebar">
    <div class="pr-side-profile">
        <img src="<?php echo e(auth()->user()->profilePhotoUrl()); ?>" alt="">
        <div>
            <h6><?php echo e(auth()->user()->name); ?></h6>
            <small>Adopter Sejak <?php echo e(auth()->user()->created_at->format('Y')); ?></small>
        </div>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('user.profile') ? 'active' : ''); ?>" href="<?php echo e(route('user.profile')); ?>">
                <i class="bi bi-person"></i> Profil Saya
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('user.applications') ? 'active' : ''); ?>" href="<?php echo e(route('user.applications')); ?>">
                <i class="bi bi-clipboard-check"></i> Status Adopsi
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('user.favorites') ? 'active' : ''); ?>" href="<?php echo e(route('user.favorites')); ?>">
                <i class="bi bi-heart"></i> Hewan Disukai
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('logout.show') ? 'active' : ''); ?>" href="<?php echo e(route('logout.show')); ?>" style="color: var(--pr-orange-dark)">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </a>
        </li>
    </ul>
</div>
<?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/partials/sidebar-user.blade.php ENDPATH**/ ?>