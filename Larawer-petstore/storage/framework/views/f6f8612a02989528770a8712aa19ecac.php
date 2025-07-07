<?php $__env->startSection('content'); ?>
    <h1>Dodaj zwierzaka</h1>

    <form method="POST" action="<?php echo e(route('pets.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('pets.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <button type="submit" class="btn btn-success">Zapisz</button>
        <a href="<?php echo e(route('pets.index')); ?>" class="btn btn-secondary">Powrót</a>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomasz/Desktop/Rest API/laraver-petstore/resources/views/pets/create.blade.php ENDPATH**/ ?>