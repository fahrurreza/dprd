

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Button trigger modal -->
    <a class="btn btn-primary my-2" href="/contract/create">
    <i class="fas fa-plus"></i> Tambah Contract
    </a>

    <!-- status -->
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kontrak Perusahaan Asuransi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asuransi</th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Asuransi</th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($contract->asuransi); ?></td>
                                <td>
                                    <center><a class="btn btn-success btn-sm" href="contract/<?php echo e($contract->id); ?>/edit" title="edit"><i class="fas fa-edit"></i></a>
                                        <form action="contract/<?php echo e($contract->id); ?>" method="post" class="d-inline">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" href="" title="delete"><i class="fas fa-trash"></i></button>
                                        </form>
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
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\login\resources\views/contract/index.blade.php ENDPATH**/ ?>