<?php $__env->startSection('content'); ?>
    <div class="container">
    <h1><?php echo e($title); ?></h1>
    <h3><?php echo e($paragraf); ?></h3>
    <?php if(count($podatak) > 0): ?>
    <ul>
        <?php $__currentLoopData = $podatak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $podatci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($podatci); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php endif; ?>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>