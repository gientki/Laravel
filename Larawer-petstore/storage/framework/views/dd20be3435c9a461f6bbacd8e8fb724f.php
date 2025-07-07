<?php $__env->startSection('content'); ?>
    <h1>Lista zwierzaków</h1>
    <a href="<?php echo e(route('pets.create')); ?>" class="btn btn-primary mb-3">Dodaj zwierzaka</a>

    <?php if($pets->count()): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Status</th>
                    <th>Kategoria</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pet->name); ?></td>
                        <td><?php echo e($pet->status); ?></td>
                        <td><?php echo e($pet->category); ?></td>
                      
                        <td>
                        <a href="<?php echo e(route('pets.show', $pet->id)); ?>" class="btn btn-sm btn-info">Pokaż</a>

                        <a href="<?php echo e(route('pets.edit', $pet->id)); ?>" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="<?php echo e(route('pets.destroy', $pet->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button onclick="return confirm('Czy na pewno usunąć?')" class="btn btn-sm btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Brak zwierzaków w bazie.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tomasz/Desktop/Rest API/laraver-petstore/resources/views/pets/index.blade.php ENDPATH**/ ?>