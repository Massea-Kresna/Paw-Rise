<?php
    $isFav = false;
    if (auth()->check()) {
        $isFav = auth()->user()->favorites()->where('animal_id', $animal->id)->exists();
    }
?>
<div class="pr-cat-card h-100" data-testid="card-animal-<?php echo e($animal->id); ?>">
    <div class="pr-cat-card-img">
        <img src="<?php echo e(asset($animal->main_photo)); ?>" alt="<?php echo e($animal->name); ?>" loading="lazy">
        <?php if(auth()->guard()->check()): ?>
            <form method="POST" action="<?php echo e(route('favorites.toggle', $animal)); ?>" class="m-0 p-0">
                <?php echo csrf_field(); ?>
                <button type="submit"
                        class="pr-cat-fav <?php echo e($isFav ? 'active' : ''); ?>"
                        title="Favorit"
                        data-testid="button-favorite-<?php echo e($animal->id); ?>">
                    <i class="bi <?php echo e($isFav ? 'bi-heart-fill' : 'bi-heart'); ?>"></i>
                </button>
            </form>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>"
               class="pr-cat-fav"
               title="Login untuk favorit"
               data-testid="link-favorite-login-<?php echo e($animal->id); ?>">
                <i class="bi bi-heart"></i>
            </a>
        <?php endif; ?>
    </div>
    <div class="pr-cat-card-body">
        <div class="d-flex justify-content-between align-items-start mb-1">
            <h6 class="pr-cat-card-name m-0" data-testid="text-animal-name-<?php echo e($animal->id); ?>"><?php echo e($animal->name); ?></h6>
            <small class="pr-muted" data-testid="text-animal-age-<?php echo e($animal->id); ?>"><?php echo e($animal->ageLabel()); ?></small>
        </div>
        <div class="pr-muted small mb-2" data-testid="text-animal-breed-<?php echo e($animal->id); ?>"><?php echo e($animal->breed); ?></div>
        <div class="pr-muted small mb-3">
            <i class="bi bi-geo-alt"></i>
            <span data-testid="text-animal-location-<?php echo e($animal->id); ?>"><?php echo e($animal->shelter->shelter_name ?? ''); ?>, <?php echo e($animal->shelter->city ?? ''); ?></span>
        </div>
        <a href="<?php echo e(route('animals.show', $animal)); ?>"
           class="btn pr-btn-outline w-100 btn-sm mt-auto"
           data-testid="link-detail-<?php echo e($animal->id); ?>">Lihat Detail</a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Pawrise\resources\views/partials/animal-card.blade.php ENDPATH**/ ?>