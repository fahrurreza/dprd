

<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php elseif(session('status_error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <!-- Content Row -->
    <div class="row">
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Tambah tahun</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(url('/tahun')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="tahun" autocomplete="off">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <select class="form-control" name="keterangan">
                                <option disabled selected>Pilih...</option>
                                <option value="Semester 1">Semester 1</option>
                                <option value="Semester 2">Semester 2</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">tahun</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>tahun</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['tahun']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($tahun->tahun); ?></td>
                                    <td>
                                        <?php if($tahun->status == 0): ?>
                                        <span class="badge badge-pill badge-danger">Non Active</span>
                                        <?php else: ?>
                                        <span class="badge badge-pill badge-success">Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <center>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?php echo e($tahun->id); ?>">Edit</button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter<?php echo e($tahun->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Form Edit</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="<?php echo e(url('tahun/'.$tahun->id)); ?>">
                                                        <?php echo method_field('patch'); ?> <?php echo csrf_field(); ?>
                                                        <div class="modal-body text-left">
                                                            <div class="form-group">
                                                                <label>tahun</label>
                                                                <input type="text" class="form-control" name="tahun" value="<?php echo e($tahun->tahun); ?>" autocomplete="off">
                                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                            </div>
                                                            <div class="form-group">
                                                                <label>keterangan</label>
                                                                <select class="form-control" name="keterangan">
                                                                    <option selected value="<?php echo e($tahun->keterangan); ?>"><?php echo e($tahun->keterangan); ?></option>
                                                                    <?php if($tahun->keterangan == "Semester 1"): ?>
                                                                    <option value="Semester 2">Semester 2</option>
                                                                    <?php elseif($tahun->keterangan == "Semester 2"): ?>
                                                                    <option value="Semester 1">Semester 1</option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <form action="<?php echo e(url('tahun/'.$tahun->id)); ?>" method="post" class="d-inline">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="delete">Hapus</button>
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

    </div>

<!-- Content Row -->

</div>
<!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/tahun/index.blade.php ENDPATH**/ ?>