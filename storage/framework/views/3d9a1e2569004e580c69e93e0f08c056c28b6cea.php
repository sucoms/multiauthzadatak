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
        <?php if(count($korisnik_1) > 0): ?>
        <tr>
            <td><?php echo e($korisnik_1['prezime']); ?></td>
            <td><?php echo e($korisnik_1['ime']); ?></td>
            <td><?php echo e($korisnik_1['tel']); ?></td>
        </tr>
        <?php endif; ?>
        <?php if(count($korisnik_2) > 0): ?>
        <tr>
            <td><?php echo e($korisnik_2['prezime']); ?></td>
            <td><?php echo e($korisnik_2['ime']); ?></td>
            <td><?php echo e($korisnik_2['tel']); ?></td>
        </tr>
        <?php endif; ?>
        <?php if(count($korisnik_3) > 0): ?>
        <tr>
            <td><?php echo e($korisnik_3['prezime']); ?></td>
            <td><?php echo e($korisnik_3['ime']); ?></td>
            <td><?php echo e($korisnik_3['tel']); ?></td>
        </tr>
        <?php endif; ?>
        <?php if(count($korisnik_4) > 0): ?>
        <tr>
            <td><?php echo e($korisnik_4['prezime']); ?></td>
            <td><?php echo e($korisnik_4['ime']); ?></td>
            <td><?php echo e($korisnik_4['tel']); ?></td>
        </tr>
        <?php endif; ?>

    </table>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>