<?php $__env->startSection('content'); ?>
    <h1>Szczegóły zwierzaka</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nazwa:</strong> <?php echo e($pet->name); ?></li>
        <li class="list-group-item"><strong>Status:</strong> <?php echo e($pet->status); ?></li>
        <li class="list-group-item"><strong>Kategoria:</strong> <?php echo e($pet->category); ?></li>
        <li class="list-group-item"><strong>Tagi:</strong> <?php echo e($pet->tags); ?></li>
        <?php if($pet->photo_url): ?>
            <li class="list-group-item">
                <strong>Zdjęcie:</strong><br>
                <img src="<?php echo e($pet->photo_url); ?>" alt="Zdjęcie" class="img-fluid mt-2">
            </li>
        <?php endif; ?>
    </ul>

    <a href="<?php echo e(route('pets.edit', $pet->id)); ?>" class="btn btn-sm btn-warning">Edytuj</a>
    <a href="<?php echo e(route('pets.index')); ?>" class="btn btn-secondary">Powrót do listy</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomasz/Desktop/Rest API/laraver-petstore/resources/views/pets/show.blade.php ENDPATH**/ ?>