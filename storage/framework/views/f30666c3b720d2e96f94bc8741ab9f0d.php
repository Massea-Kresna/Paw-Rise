<?php echo csrf_field(); ?>
<div class="row g-3">
    <div class="col-md-3 text-center">
        <img id="preview-photo" src="<?php echo e(isset($animal) ? $animal->mainPhotoUrl() : 'https://via.placeholder.com/200?text=Foto'); ?>" alt="" class="img-fluid rounded mb-2" style="height: 200px; object-fit: cover; width: 100%;">
        <input type="file" name="main_photo" class="form-control form-control-sm" accept="image/*" onchange="document.getElementById('preview-photo').src=URL.createObjectURL(this.files[0])">
    </div>
    <div class="col-md-9">
        <div class="row g-3">
            <div class="col-md-8"><label class="form-label">Nama Hewan</label><input type="text" name="name" value="<?php echo e(old('name', $animal->name ?? '')); ?>" class="form-control" required></div>
            <div class="col-md-4"><label class="form-label">Kode</label><input type="text" name="code" value="<?php echo e(old('code', $animal->code ?? '')); ?>" class="form-control" placeholder="otomatis"></div>
            <div class="col-md-4"><label class="form-label">Jenis</label>
                <select name="species" class="form-select" required>
                    <?php $__currentLoopData = ['anjing','kucing','lainnya']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($sp); ?>" <?php echo e(old('species', $animal->species ?? '') == $sp ? 'selected':''); ?>><?php echo e(ucfirst($sp)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4"><label class="form-label">Ras</label><input type="text" name="breed" value="<?php echo e(old('breed', $animal->breed ?? '')); ?>" class="form-control" required></div>
            <div class="col-md-4"><label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <?php $__currentLoopData = ['tersedia','diproses','diadopsi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($st); ?>" <?php echo e(old('status', $animal->status ?? 'tersedia') == $st ? 'selected':''); ?>><?php echo e(ucfirst($st)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-3"><label class="form-label">Usia (bulan)</label><input type="number" name="age_months" value="<?php echo e(old('age_months', $animal->age_months ?? '')); ?>" class="form-control" min="0" required></div>
            <div class="col-md-3"><label class="form-label">Berat (kg)</label><input type="number" step="0.1" name="weight_kg" value="<?php echo e(old('weight_kg', $animal->weight_kg ?? '')); ?>" class="form-control"></div>
            <div class="col-md-3"><label class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-select" required>
                    <option value="jantan" <?php echo e(old('gender', $animal->gender ?? '') == 'jantan' ? 'selected':''); ?>>Jantan</option>
                    <option value="betina" <?php echo e(old('gender', $animal->gender ?? '') == 'betina' ? 'selected':''); ?>>Betina</option>
                </select>
            </div>
            <div class="col-md-3"><label class="form-label">Ukuran</label>
                <select name="size" class="form-select" required>
                    <?php $__currentLoopData = ['kecil','sedang','besar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($sz); ?>" <?php echo e(old('size', $animal->size ?? '') == $sz ? 'selected':''); ?>><?php echo e(ucfirst($sz)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-check"><input type="checkbox" name="vaccinated" value="1" class="form-check-input" id="vac" <?php echo e(old('vaccinated', $animal->vaccinated ?? false) ? 'checked' : ''); ?>><label class="form-check-label" for="vac">Sudah Vaksin</label></div>
                <div class="form-check"><input type="checkbox" name="sterilized" value="1" class="form-check-input" id="ster" <?php echo e(old('sterilized', $animal->sterilized ?? false) ? 'checked' : ''); ?>><label class="form-check-label" for="ster">Sudah Steril</label></div>
            </div>
        </div>
    </div>
    <div class="col-12"><label class="form-label">Karakteristik (singkat)</label><input type="text" name="characteristics" value="<?php echo e(old('characteristics', $animal->characteristics ?? '')); ?>" class="form-control" placeholder="Ramah, aktif, suka anak-anak"></div>
    <div class="col-12"><label class="form-label">Deskripsi</label><textarea name="description" rows="4" class="form-control"><?php echo e(old('description', $animal->description ?? '')); ?></textarea></div>
    <div class="col-12"><label class="form-label">Riwayat Medis</label><textarea name="medical_history" rows="3" class="form-control"><?php echo e(old('medical_history', $animal->medical_history ?? '')); ?></textarea></div>
</div>
<?php /**PATH C:\Users\LENOVO\Pawrise\resources\views/shelter/animals/_form.blade.php ENDPATH**/ ?>