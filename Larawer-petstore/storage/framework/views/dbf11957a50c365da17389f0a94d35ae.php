<?php $__env->startSection('content'); ?>
    <h1>Błąd 404</h1>
    <p>Strona nie została znaleziona.</p>
    <a href="<?php echo e(route('pets.index')); ?>" class="btn btn-primary">Powrót do strony głównej</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomasz/Desktop/Rest API/laraver-petstore/resources/views/errors/404.blade.php ENDPATH**/ ?>