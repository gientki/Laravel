<div class="mb-3">
    <label for="name" class="form-label">Nazwa</label>
    <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $pet->name ?? '')); ?>">
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select">
        <?php $__currentLoopData = ['available', 'pending', 'sold']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($status); ?>" <?php echo e((old('status', $pet->status ?? '') == $status) ? 'selected' : ''); ?>>
                <?php echo e(ucfirst($status)); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="mb-3">
    <label for="category" class="form-label">Kategoria</label>
    <input type="text" name="category" class="form-control" value="<?php echo e(old('category', $pet->category ?? '')); ?>">
</div>

<div class="mb-3">
    <label for="photo_url" class="form-label">URL zdjęcia</label>
    <input type="url" name="photo_url" class="form-control" value="<?php echo e(old('photo_url', $pet->photo_url ?? '')); ?>">
</div>

<div class="mb-3">
    <label for="tags" class="form-label">Tagi (oddzielone przecinkami)</label>
    <input type="text" name="tags" class="form-control" value="<?php echo e(old('tags', $pet->tags ?? '')); ?>">
</div>
<?php /**PATH /home/tomasz/Desktop/Rest API/laraver-petstore/resources/views/pets/form.blade.php ENDPATH**/ ?>