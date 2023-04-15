

<?php $__env->startSection('content'); ?>

    <?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php elseif(session('status_error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(session('status_error')); ?>

    </div>
    <?php endif; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Anda Login Sebagai : <?php echo e(Auth::user()->position); ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center mt-5 text-center">
        <div class="my-5">
            <div class="card-body p-0">
                <h3 class="my-3">SELAMAT DATANG : <i class="fas fa-user fa-2x"></i> <?php echo e(Auth::user()->name); ?></h3>

                <h4 class="my-3">Sistem Administrasi Sekolah</h4>

                <p>Created By :</p>
                <p>Nama : Adella</p>
                <p>Npm : 1714370186</p>
            </div>
        </div>
    </div>

<!-- Content Row -->

</div>
<!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/dashboard/index.blade.php ENDPATH**/ ?>