

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Button trigger modal -->
    <a class="btn btn-primary my-2" href="/patient/create">
        <i class="fas fa-plus"></i> Entri Pasien
    </a>
    <a class="btn btn-warning my-2" href="<?php echo e(url('/rwj')); ?>"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>

    <!-- status -->
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <!-- status -->
    <?php if(session('status_error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('status_error')); ?>

        </div>
    <?php endif; ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pilih Untuk Pasien Berulang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rekam Medik</th>
                                <th>Name</th>
                                <th>NIK</th>
                                <th>Address</th>
                                <th>BirthDay</th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Rekam Medik</th>
                                <th>Name</th>
                                <th>NIK</th>
                                <th>Address</th>
                                <th>BirthDay</th>
                                <th><center>Action</center></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($data->rm); ?></td>
                                <td><?php echo e($data->name); ?></td>
                                <td><?php echo e($data->nik); ?></td>
                                <td><?php echo e($data->address); ?></td>
                                <td><?php echo e($data->birthday); ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-primary" href="/rwj/<?php echo e($data->id); ?>/daftar">Daftar</a>
                                        <a class="btn btn-success" href="/patient/<?php echo e($data->id); ?>/edit">Edit</a>
                                        <a class="btn btn-info" href="/patient/<?php echo e($data->id); ?>">Detail</a>
                                    </center>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\login\resources\views/patient/index.blade.php ENDPATH**/ ?>