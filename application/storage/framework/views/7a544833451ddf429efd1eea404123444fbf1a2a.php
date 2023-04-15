

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Button trigger modal -->
    <a class="btn btn-primary my-2" href="user/create">
        <i class="fas fa-user-plus"></i> Tambah User
    </a>

    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('status_error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('status_error')); ?>

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
                                <th>Name</th>
                                <th>Username</th>
                                <th>Position</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Position</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->username); ?></td>
                                <td><?php echo e($user->position); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update')): ?>
                                <center>
                                        <a class="btn btn-success btn-sm" href="user/<?php echo e($user->id); ?>/edit" title="edit"><i class="fas fa-edit"></i></a>
                                        <form action="user/<?php echo e($user->id); ?>" method="post" class="d-inline">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" href="" title="delete"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </center>
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
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hospital\resources\views/user/index.blade.php ENDPATH**/ ?>