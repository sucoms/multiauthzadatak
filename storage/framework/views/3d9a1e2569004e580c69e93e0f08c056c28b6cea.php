<?php $__env->startSection('content'); ?>
    <div class="container">
    <h1><?php echo e($title); ?></h1>
    <p><?php echo e($paragraf); ?></p>
    <?php if(count($korisnici) > 0): ?>
    <ul>
        <?php $__currentLoopData = $korisnici; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $korisnik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($korisnik); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>