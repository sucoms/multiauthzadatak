<?php $__env->startSection('content'); ?>
    <div class="container">
    <h1><?php echo e($title); ?></h1>
    <h2><?php echo e($title2); ?></h2>
    </div>
    <?php $__env->stopSection(); ?>
        

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>