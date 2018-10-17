<?php $__env->startSection('content'); ?>
    <div class="container">
    

    
    <h1>Logged in as <?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->surname); ?></h1>
    <h3><?php echo e($paragraf); ?></h3>
    <?php if(count($podatak) > 0): ?>
    <ul>
            <li>Phone: <?php echo e(Auth::user()->phone); ?></li>
            <li>Email: <?php echo e(Auth::user()->email); ?></li>
    </ul>
    <hr>
    <?php endif; ?>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>