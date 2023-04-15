

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Button Daftar -->
    <a class="btn btn-primary my-2" href="<?php echo e(url('/patient')); ?>">Pendaftaran</a>

    <!-- status -->
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pasien Rawat Jalan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>RM</th>
                                <th>Name</th>
                                <th>NIK</th>
                                <th>Bill To</th>
                                <th>Address</th>
                                <th>Docter</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>RM</th>
                                <th>Name</th>
                                <th>NIK</th>
                                <th>Bill To</th>
                                <th>Address</th>
                                <th>Docter</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rwj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($rwj->rm); ?></td>
                                <td><?php echo e($rwj->name); ?></td>
                                <td><?php echo e($rwj->nik); ?></td>
                                <td><?php echo e($rwj->asuransi); ?></td>
                                <td><?php echo e($rwj->address); ?></td>
                                <td><?php echo e($rwj->docter); ?></td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access')): ?>
                                <td>
                                    <button class="btn btn-success btn-sm" title="edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-warning btn-sm" title="batal"><i class="fas fa-undo"></i></button>
                                    <button class="btn btn-danger btn-sm" title="delete"><i class="fas fa-trash"></i></button>
                                </td>
                                <?php endif; ?>
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
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/rwj/index.blade.php ENDPATH**/ ?>