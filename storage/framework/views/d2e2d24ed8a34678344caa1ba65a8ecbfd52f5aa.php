<?php $__env->startSection('content'); ?>
    <div class="container">
    <h1><?php echo e($title); ?></h1>
    <p>Welcome to users page</p>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>