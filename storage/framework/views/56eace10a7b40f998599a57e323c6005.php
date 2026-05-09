<?php $shelter = auth()->user()->shelter; ?>
<div class="pr-sidebar">
    <div class="pr-side-profile">
        <img src="<?php echo e($shelter ? $shelter->logoUrl() : auth()->user()->profilePhotoUrl()); ?>" alt="">
        <div>
            <h6><?php echo e($shelter->shelter_name ?? auth()->user()->name); ?></h6>
            <small><?php echo e($shelter->city ?? ''); ?></small>
        </div>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('shelter.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('shelter.dashboard')); ?>">
                <i class="bi bi-grid"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('shelter.animals.*') ? 'active' : ''); ?>" href="<?php echo e(route('shelter.animals.index')); ?>">
                <i class="bi bi-clipboard-check"></i> Kelola Hewan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('shelter.applications.*') ? 'active' : ''); ?>" href="<?php echo e(route('shelter.applications.index')); ?>">
                <i class="bi bi-file-earmark-text"></i> Permohonan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('logout.show') ? 'active' : ''); ?>" href="<?php echo e(route('logout.show')); ?>" style="color: var(--pr-orange-dark)">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </a>
        </li>
    </ul>
</div>
<?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/partials/sidebar-shelter.blade.php ENDPATH**/ ?>