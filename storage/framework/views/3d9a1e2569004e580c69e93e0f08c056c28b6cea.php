<?php $__env->startSection('content'); ?>
     <style>
        /* table{
            border-style: solid!important;
            width: 40%!important;
        }
        td, th{
            border: 2px!important;
            border-color: #000000!important;
            text-align: center!important;
            padding: 6px!important;
        }
        td{
            border-style: ridge!important;
        } */
        
        .modal-content{
            width: 500px;
            height: 200px;
            background-color: #F5F5F5;
            border-radius: 4px; 
            text-align: center;
            padding: 20px;
            position: relative;
        }
        .remove-button{
            height:25px;
            width:25px;
            position: relative;
            left: 40%;
            right: -60%;
        }
        
        
        .close{
            position: absolute;
            top: 0;
            right: -50%;
            left: -50%;
            color: #ffffff;
            opacity: 10;
            font-size: 20px;
        }
        
        .modal-backdrop.fade{
            opacity: 0.5!important;
        }
        .fade:not(.show){
            opacity: 1;
        }
        
        
    </style>
    <div class="container">
        
    
        



        
                            
                            
                            
                            
        <h1><?php echo e($title); ?>, <?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->surname); ?>.</h1>
        <h3><?php echo e($paragraf); ?></h3>
        <hr>
        
        
        <?php echo $__env->make('pages.live_search', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        

        
        <hr>
        <h1>Dodaj novog korisnika</h1>
        
        <?php echo $__env->make('pages.adminForma', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
    </div>
    <script>
        
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>