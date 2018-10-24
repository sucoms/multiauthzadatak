<?php $__env->startSection('content'); ?>
    
    <div class="container">
        
    
        



        
                            
                            
                            
                            
        <h1><?php echo e($title); ?>, <?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->surname); ?>.</h1>
        <h3><?php echo e($paragraf); ?></h3>
        <hr>
        <?php echo Form::open(['action' => 'PagesController@action', 'method' => 'POST' ]); ?>

        <?php echo $__env->make('pages.live_search', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo Form::close(); ?>


        
        <hr>
        <h1>Dodaj novog korisnika</h1>
        <?php echo Form::open(['action' => 'PagesController@adminForma', 'method' => 'POST' ]); ?>

        <?php echo $__env->make('pages.adminForma', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo Form::close(); ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>