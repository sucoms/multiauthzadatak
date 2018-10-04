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
    <p><?php echo e($paragraf); ?></p>
    <?php if(count($korisnici) > 0): ?>
    <ul>
        <?php $__currentLoopData = $korisnici; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $korisnik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($korisnik); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php endif; ?>
    <table>
        <tr>
            <th>Prezime</th>
            <th>Ime</th>
            <th>Telefon</th>
        </tr>
        <tr>
            <td><?php echo e($prezime1); ?></td>
            <td><?php echo e($ime1); ?></td>
            <td><?php echo e($tel1); ?></td>
        </tr>
        <tr>
            <td><?php echo e($prezime2); ?></td>
            <td><?php echo e($ime2); ?></td>
            <td><?php echo e($tel2); ?></td>
        </tr>
        <tr>
            <td><?php echo e($prezime3); ?></td>
            <td><?php echo e($ime3); ?></td>
            <td><?php echo e($tel3); ?></td>
        </tr>
        <tr>
            <td><?php echo e($prezime4); ?></td>
            <td><?php echo e($ime4); ?></td>
            <td><?php echo e($tel4); ?></td>
        </tr>
    </table>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>