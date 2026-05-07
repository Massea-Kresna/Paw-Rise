<?php $__env->startSection('title', 'Katalog Hewan - PawRise'); ?>
<?php $__env->startSection('content'); ?>


<section class="pr-cat-hero">
    <div class="container">
        <h1 class="pr-cat-hero-title">Temukan Sahabat Baru Anda</h1>
        <p class="pr-cat-hero-sub">Ribuan hewan menggemaskan menunggu rumah yang penuh kasih sayang.</p>

        <form method="GET" action="<?php echo e(route('catalog.index')); ?>" class="pr-cat-search-row">
            
            <?php $__currentLoopData = ['species','age','size']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = (array) request($arr, []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="<?php echo e($arr); ?>[]" value="<?php echo e($v); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(request('gender')): ?><input type="hidden" name="gender" value="<?php echo e(request('gender')); ?>"><?php endif; ?>
            <?php if(request('sort')): ?>  <input type="hidden" name="sort"   value="<?php echo e(request('sort')); ?>">  <?php endif; ?>

            
            <div class="pr-cat-searchbar">
                <i class="bi bi-search pr-cat-search-icon"></i>
                <input type="text" name="q" value="<?php echo e(request('q')); ?>"
                       class="form-control pr-cat-search-input"
                       placeholder="Cari berdasarkan nama, ras, dll."
                       data-testid="input-search">
                <button type="submit" class="btn pr-cat-search-btn" data-testid="button-search">Cari</button>
            </div>

            
            <div class="pr-cat-loc">
                <div class="pr-cat-loc-icon"><i class="bi bi-geo-alt-fill"></i></div>
                <div class="flex-grow-1">
                    <small class="pr-cat-loc-label">LOKASI</small>
                    <select name="city" class="pr-cat-loc-select"
                            onchange="this.form.submit()"
                            data-testid="select-location">
                        <option value="">Semua Lokasi</option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c); ?>" <?php echo e(request('city') == $c ? 'selected' : ''); ?>><?php echo e($c); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <i class="bi bi-chevron-down text-muted" style="font-size:.8rem;"></i>
            </div>
        </form>
    </div>
</section>


<section class="pr-cat-body">
    <div class="container">
        <div class="row g-4">

            
            <aside class="col-lg-3">
                <div class="pr-filter-card">
                    <form method="GET" action="<?php echo e(route('catalog.index')); ?>" id="filterForm">
                        <?php if(request('q')): ?>    <input type="hidden" name="q"    value="<?php echo e(request('q')); ?>">    <?php endif; ?>
                        <?php if(request('city')): ?> <input type="hidden" name="city" value="<?php echo e(request('city')); ?>"> <?php endif; ?>
                        <?php if(request('sort')): ?> <input type="hidden" name="sort" value="<?php echo e(request('sort')); ?>"> <?php endif; ?>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="pr-filter-title m-0">Filter</h6>
                            <a href="<?php echo e(route('catalog.index')); ?>"
                               class="pr-filter-reset"
                               data-testid="link-reset-filter">Reset</a>
                        </div>

                        
                        <div class="pr-filter-group">
                            <div class="pr-filter-label">Jenis Hewan</div>
                            <?php $__currentLoopData = ['anjing' => 'Anjing', 'kucing' => 'Kucing', 'lainnya' => 'Lainnya']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="pr-filter-check">
                                    <input type="checkbox" name="species[]" value="<?php echo e($val); ?>"
                                           <?php echo e(in_array($val, (array) request('species', [])) ? 'checked' : ''); ?>

                                           data-testid="check-species-<?php echo e($val); ?>">
                                    <span><?php echo e($label); ?></span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <div class="pr-filter-group">
                            <div class="pr-filter-label">Umur</div>
                            <?php $__currentLoopData = [
                                'bayi'   => 'Bayi (< 6 Bulan)',
                                'muda'   => 'Muda (6 - 12 Bulan)',
                                'dewasa' => 'Dewasa (1 - 5 Tahun)',
                                'senior' => 'Senior (> 5 Tahun)',
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="pr-filter-check">
                                    <input type="checkbox" name="age[]" value="<?php echo e($val); ?>"
                                           <?php echo e(in_array($val, (array) request('age', [])) ? 'checked' : ''); ?>

                                           data-testid="check-age-<?php echo e($val); ?>">
                                    <span><?php echo e($label); ?></span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <div class="pr-filter-group">
                            <div class="pr-filter-label">Gender</div>
                            <div class="pr-pill-group">
                                <?php $__currentLoopData = ['jantan' => 'Jantan', 'betina' => 'Betina']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $active = request('gender') === $val; ?>
                                    <label class="pr-pill <?php echo e($active ? 'active' : ''); ?>"
                                           data-testid="pill-gender-<?php echo e($val); ?>">
                                        <input type="radio" name="gender" value="<?php echo e($val); ?>"
                                               <?php echo e($active ? 'checked' : ''); ?> hidden>
                                        <?php echo e($label); ?>

                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        
                        <div class="pr-filter-group">
                            <div class="pr-filter-label">Ukuran</div>
                            <?php $__currentLoopData = ['kecil' => 'Kecil', 'sedang' => 'Sedang', 'besar' => 'Besar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="pr-filter-check">
                                    <input type="checkbox" name="size[]" value="<?php echo e($val); ?>"
                                           <?php echo e(in_array($val, (array) request('size', [])) ? 'checked' : ''); ?>

                                           data-testid="check-size-<?php echo e($val); ?>">
                                    <span><?php echo e($label); ?></span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <button type="submit"
                                class="btn pr-btn-primary w-100 mt-2"
                                style="border-radius: 12px;"
                                data-testid="button-apply-filter">
                            Terapkan Filter
                        </button>
                    </form>
                </div>
            </aside>

            
            <div class="col-lg-9">

                
                <div class="d-flex flex-wrap justify-content-between align-items-start mb-4 gap-3">
                    <div>
                        <h3 class="pr-cat-h3 mb-1">Temukan Sahabat Barumu</h3>
                        <p class="pr-muted mb-0" data-testid="text-total-count">
                            <?php echo e($animals->total()); ?> hewan sedang mencari rumah.
                        </p>
                    </div>

                    
                    <form method="GET" class="pr-sort-chip">
                        <?php $__currentLoopData = request()->except('sort', 'page'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(is_array($v)): ?>
                                <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" name="<?php echo e($k); ?>[]" value="<?php echo e($vv); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <input type="hidden" name="<?php echo e($k); ?>" value="<?php echo e($v); ?>">
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <span class="pr-muted" style="font-size:.9rem;">Urutkan:</span>
                        <select name="sort" onchange="this.form.submit()"
                                class="pr-sort-select"
                                data-testid="select-sort">
                            <option value="terbaru" <?php echo e(request('sort', 'terbaru') == 'terbaru' ? 'selected' : ''); ?>>Terbaru</option>
                            <option value="terlama" <?php echo e(request('sort') == 'terlama' ? 'selected' : ''); ?>>Terlama</option>
                        </select>
                    </form>
                </div>

                <?php if($animals->count()): ?>
                    
                    <div class="row g-4">
                        <?php $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-xl-4">
                                <?php echo $__env->make('partials.animal-card', ['animal' => $animal], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <?php if($animals->hasPages()): ?>
                        <nav class="pr-pagination mt-5" aria-label="Pagination">
                            <ul>
                                
                                <li class="<?php echo e($animals->onFirstPage() ? 'disabled' : ''); ?>">
                                    <a href="<?php echo e($animals->previousPageUrl() ?? '#'); ?>"
                                       data-testid="link-prev-page">
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>

                                
                                <?php for($i = 1; $i <= $animals->lastPage(); $i++): ?>
                                    <li class="<?php echo e($animals->currentPage() === $i ? 'active' : ''); ?>">
                                        <a href="<?php echo e($animals->url($i)); ?>"
                                           data-testid="link-page-<?php echo e($i); ?>"><?php echo e($i); ?></a>
                                    </li>
                                <?php endfor; ?>

                                
                                <li class="<?php echo e(! $animals->hasMorePages() ? 'disabled' : ''); ?>">
                                    <a href="<?php echo e($animals->nextPageUrl() ?? '#'); ?>"
                                       data-testid="link-next-page">
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>

                <?php else: ?>
                    
                    <div class="pr-filter-card text-center py-5">
                        <div style="font-size: 3rem; color: var(--pr-orange-soft);">
                            <i class="bi bi-search"></i>
                        </div>
                        <h6 class="fw-bold mt-3 mb-1">Tidak ada hewan ditemukan</h6>
                        <p class="pr-muted mb-3" style="font-size:.9rem;">
                            Coba ubah filter atau kata kunci pencarianmu.
                        </p>
                        <a href="<?php echo e(route('catalog.index')); ?>" class="btn pr-btn-primary" style="border-radius:12px;">
                            Reset Filter
                        </a>
                    </div>
                <?php endif; ?>

            </div>
            

        </div>
    </div>
</section>

<script>
    // Toggle gender pill — klik aktif lagi = uncheck
    document.querySelectorAll('.pr-pill').forEach(p => {
        p.addEventListener('click', e => {
            const radio = p.querySelector('input[type=radio]');
            if (!radio) return;
            if (radio.checked) {
                radio.checked = false;
                p.classList.remove('active');
                e.preventDefault();
            } else {
                document.querySelectorAll('.pr-pill').forEach(o => o.classList.remove('active'));
                p.classList.add('active');
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/catalog/index.blade.php ENDPATH**/ ?>