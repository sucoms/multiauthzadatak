<?php $__env->startSection('content'); ?>
    <style>
        table{
            border-style: solid;
            width: 30%;
        }
        td, th{
            border: 2px;
            border-color: #000000;
            text-align: left;
            padding: 6px;
        }
        td{
            border-style: ridge
        }
    </style>
    <div class="container">
    
        <h1><?php echo e($title); ?></h1>
        <h3><?php echo e($paragraf); ?></h3>



        <table>
            <tr>
                <th>Prezime</th>
                <th>Ime</th>
                <th>Telefon</th>
            </tr>
            <?php if(count($korisnici) > 0): ?>
                <?php $__currentLoopData = $korisnici; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $korisnik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        
                        
                        
                        <td><?php echo e($korisnik->surname); ?></td>
                        <td><?php echo e($korisnik->name); ?></td>
                        <td><?php echo e($korisnik->phone); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </table>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>