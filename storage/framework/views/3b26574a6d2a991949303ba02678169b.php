 
<?php $__env->startSection('title', 'Formulir Adopsi - PawRise'); ?>
 
<?php $__env->startSection('body'); ?>
 

<div class="d-flex justify-content-end align-items-center px-4 py-3 bg-white border-bottom">
    <a href="<?php echo e(route('animals.show', $animal)); ?>" class="d-inline-flex align-items-center gap-2 text-decoration-none fw-semibold"
       style="color: var(--pr-text-muted); font-size: .9rem;">
        <i class="bi bi-x"></i> BATAL
    </a>
</div>
 
<div class="container-xl py-4" style="max-width: 1100px;">
    <div class="row g-4">
 
        
        <div class="col-lg-4">
 
            
            <div class="pr-card overflow-hidden mb-3" style="border: 2px solid var(--pr-orange);">
                <div style="position: relative; aspect-ratio: 4/3; overflow: hidden; background: #eee;">
                    <img src="<?php echo e($animal->mainPhotoUrl()); ?>"
                         alt="<?php echo e($animal->name); ?>"
                         style="width:100%; height:100%; object-fit:cover;">
                    <span class="pr-tag"
                          style="position:absolute; bottom:12px; left:12px; border-radius:999px;">
                        <i class="bi bi-paw-fill me-1"></i> SIAP ADOPSI
                    </span>
                </div>
                <div class="p-3">
                    <h5 class="fw-bold mb-1"><?php echo e($animal->name); ?></h5>
                    <p class="mb-0" style="color: var(--pr-text-muted); font-size: .9rem;">
                        <i class="bi bi-geo-alt"></i> <?php echo e($animal->shelter->shelter_name ?? ''); ?>

                    </p>
                </div>
            </div>
 
            
            <div class="pr-card p-3">
                <p class="fw-bold mb-3" style="font-size: .95rem;">Tahapan Aplikasi</p>
 
                
                <div class="pr-step active">
                    <div class="pr-step-icon">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div>
                        <div class="fw-semibold" style="font-size:.9rem;">1. Data Diri</div>
                        <div class="small-muted">Informasi kontak dasar</div>
                    </div>
                </div>
                
                <div style="width:2px; height:18px; background:var(--pr-border); margin-left:13px;"></div>
 
                
                <div class="pr-step">
                    <div class="pr-step-icon">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <div>
                        <div class="fw-semibold" style="font-size:.9rem; color: var(--pr-text-muted);">2. Alasan Adopsi</div>
                        <div class="small-muted">Motivasi merawat</div>
                    </div>
                </div>
                
                <div style="width:2px; height:18px; background:var(--pr-border); margin-left:13px;"></div>
 
                
                <div class="pr-step">
                    <div class="pr-step-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div>
                        <div class="fw-semibold" style="font-size:.9rem; color: var(--pr-text-muted);">3. Pengalaman</div>
                        <div class="small-muted">Riwayat memelihara</div>
                    </div>
                </div>
            </div>
        </div>
 
        
        <div class="col-lg-8">
            <div class="pr-card p-4 p-md-5">
 
                
                <h3 class="fw-bold mb-1">Formulir Permohonan Adopsi</h3>
                <p class="mb-4" style="color: var(--pr-text-muted);">
                    Lengkapi data di bawah ini untuk memulai perjalanan indah bersama sahabat barumu.<br>
                    Kami akan meninjau aplikasimu dengan penuh perhatian.
                </p>
 
                
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($e); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
 
                <form method="POST" action="<?php echo e(route('adoption.store', $animal)); ?>">
                    <?php echo csrf_field(); ?>
 
                    
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2"
                         style="border-bottom: 1px solid var(--pr-border);">
                        <span style="color: var(--pr-orange); font-size: 1.1rem;">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <h5 class="fw-bold mb-0" style="color: var(--pr-orange);">Data Pribadi</h5>
                    </div>
 
                    <div class="row g-3 mb-4">
                        
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:.75rem; text-transform:uppercase; letter-spacing:.06em; color:var(--pr-text-muted); font-weight:700;">
                                NAMA LENGKAP
                            </label>
                            <input type="text"
                                   name="full_name"
                                   value="<?php echo e(old('full_name', auth()->user()->name)); ?>"
                                   placeholder="Masukkan nama sesuai KTP"
                                   class="form-control <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   required>
                            <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
 
                        
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:.75rem; text-transform:uppercase; letter-spacing:.06em; color:var(--pr-text-muted); font-weight:700;">
                                NOMOR WHATSAPP AKTIF
                            </label>
                            <input type="text"
                                   name="whatsapp"
                                   value="<?php echo e(old('whatsapp', auth()->user()->phone ?? '')); ?>"
                                   placeholder="Contoh: 08123456789"
                                   class="form-control <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   required>
                            <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
 
                        
                        <div class="col-12">
                            <label class="form-label" style="font-size:.75rem; text-transform:uppercase; letter-spacing:.06em; color:var(--pr-text-muted); font-weight:700;">
                                ALAMAT EMAIL
                            </label>
                            <input type="email"
                                   name="email"
                                   value="<?php echo e(old('email', auth()->user()->email)); ?>"
                                   placeholder="budi@example.com"
                                   class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   required>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
 
                        
                        <div class="col-12">
                            <label class="form-label" style="font-size:.75rem; text-transform:uppercase; letter-spacing:.06em; color:var(--pr-text-muted); font-weight:700;">
                                ALAMAT DOMISILI LENGKAP
                            </label>
                            <textarea name="address"
                                      rows="3"
                                      placeholder="Masukkan alamat lengkap beserta RT/RW dan kodepos"
                                      class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                      required><?php echo e(old('address', auth()->user()->address ?? '')); ?></textarea>
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
 
                    
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2"
                         style="border-bottom: 1px solid var(--pr-border);">
                        <span style="color: var(--pr-orange); font-size: 1.1rem;">
                            <i class="bi bi-heart-fill"></i>
                        </span>
                        <h5 class="fw-bold mb-0" style="color: var(--pr-orange);">Alasan Adopsi</h5>
                    </div>
 
                    <div class="mb-4">
                        <label class="form-label" style="font-size:.75rem; text-transform:uppercase; letter-spacing:.06em; color:var(--pr-text-muted); font-weight:700;">
                            MENGAPA ANDA INGIN MENGADOPSI HEWAN INI?
                        </label>
                        <p class="mb-2" style="font-size:.85rem; color:var(--pr-text-muted);">
                            Ceritakan sedikit tentang motivasi Anda dan lingkungan rumah yang akan menjadi tempat tinggal barunya.
                        </p>
                        <textarea name="reason"
                                  rows="5"
                                  placeholder="Saya ingin mengadopsi karena..."
                                  class="form-control <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                  required><?php echo e(old('reason')); ?></textarea>
                        <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
 
                    
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2"
                         style="border-bottom: 1px solid var(--pr-border);">
                        <span style="color: var(--pr-orange); font-size: 1.1rem;">
                            <i class="bi bi-clock-history"></i>
                        </span>
                        <h5 class="fw-bold mb-0" style="color: var(--pr-orange);">Pengalaman Memelihara</h5>
                    </div>
 
                    <div class="mb-4">
                        <label class="form-label mb-3" style="font-size:.75rem; text-transform:uppercase; letter-spacing:.06em; color:var(--pr-text-muted); font-weight:700;">
                            APAKAH ANDA PERNAH ATAU SEDANG MEMELIHARA HEWAN PELIHARAAN?
                        </label>
 
                        
                        <div class="d-flex gap-2 flex-wrap" id="experienceGroup">
                            <?php $__currentLoopData = ['belum' => 'Belum Pernah', 'pernah' => 'Pernah di Masa Lalu', 'sedang' => 'Sedang Memelihara']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button type="button"
                                        class="exp-btn btn <?php if(old('experience') === $value): ?> exp-active <?php endif; ?>"
                                        data-value="<?php echo e($value); ?>"
                                        style="border: 1.5px solid var(--pr-border); border-radius: 10px; padding: 10px 20px; font-weight: 600; font-size: .9rem; background: #fff; color: var(--pr-text); transition: all .15s;">
                                    <?php echo e($label); ?>

                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <input type="hidden" name="experience" id="experienceInput" value="<?php echo e(old('experience', '')); ?>" required>
                        <?php $__errorArgs = ['experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger mt-1" style="font-size:.85rem;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
 
                    
                    <div class="d-flex gap-3 p-3 mb-4 rounded-3"
                         style="background: var(--pr-info-bg); border: 1px solid #bfdbfe;">
                        <span style="color: var(--pr-info); font-size: 1.1rem; flex-shrink:0; margin-top:1px;">
                            <i class="bi bi-info-circle-fill"></i>
                        </span>
                        <p class="mb-0" style="font-size:.88rem; color: #1e40af; line-height:1.55;">
                            Tim kami mungkin akan menghubungi Anda untuk verifikasi data dan wawancara singkat
                            via telepon atau WhatsApp setelah formulir ini diajukan.
                        </p>
                    </div>
 
                    
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <input class="form-check-input mt-1 flex-shrink-0 <?php $__errorArgs = ['agreement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               type="checkbox"
                               name="agreement"
                               value="1"
                               id="agreement"
                               <?php echo e(old('agreement') ? 'checked' : ''); ?>

                               required
                               style="width:18px; height:18px; accent-color: var(--pr-orange); cursor:pointer;">
                        <label for="agreement" class="mb-0" style="font-size:.9rem; color: var(--pr-text-muted); cursor:pointer; line-height:1.55;">
                            Saya menyatakan bahwa data yang diisi adalah benar. Saya bersedia untuk dihubungi oleh
                            pihak shelter dan memahami bahwa pengisian formulir ini tidak menjamin persetujuan adopsi.
                        </label>
                    </div>
                    <?php $__errorArgs = ['agreement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger mb-3" style="font-size:.85rem;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
 
                    
                    <div class="d-flex align-items-center justify-content-end gap-3 pt-2">
                        <a href="<?php echo e(route('animals.show', $animal)); ?>"
                           class="text-decoration-none fw-semibold"
                           style="color: var(--pr-text-muted); font-size:.95rem;">
                            Simpan Draft
                        </a>
                        <button type="submit" class="pr-btn-primary d-inline-flex align-items-center gap-2 px-4 py-3" style="border-radius: 14px; font-size:.95rem;">
                            Ajukan Permohonan <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
 
                </form>
            </div>
        </div>
        
 
    </div>
</div>
 

<script>
document.addEventListener('DOMContentLoaded', function () {
    const btns = document.querySelectorAll('.exp-btn');
    const input = document.getElementById('experienceInput');
 
    const activeStyle = {
        background: 'var(--pr-orange)',
        color: '#fff',
        borderColor: 'var(--pr-orange)',
    };
    const inactiveStyle = {
        background: '#fff',
        color: 'var(--pr-text, #1F2A37)',
        borderColor: 'var(--pr-border, #E5E7EB)',
    };
 
    // Init: highlight if old value is set
    if (input.value) {
        btns.forEach(btn => {
            const isActive = btn.dataset.value === input.value;
            Object.assign(btn.style, isActive ? activeStyle : inactiveStyle);
        });
    }
 
    btns.forEach(btn => {
        btn.addEventListener('click', function () {
            input.value = this.dataset.value;
            btns.forEach(b => Object.assign(b.style, inactiveStyle));
            Object.assign(this.style, activeStyle);
        });
    });
});
</script>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/adoption/create.blade.php ENDPATH**/ ?>