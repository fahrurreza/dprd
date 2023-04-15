

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
    
    
    <?php echo $__env->make('absen.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(count($data['absen']) == 0): ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Absensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Hadir</th>
                            <th>Sakit</th>
                            <th>Izin</th>
                            <th>Alfa</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody> 
                    <form action="<?php echo e(url('/absen')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $data['siswa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <?php echo e($student->nama); ?>

                                <input type="hidden" name="student_id<?php echo e($student->id); ?>" value="<?php echo e($student->id); ?>">
                                <input type="hidden" name="gruop_id" value="<?php echo e($data['group_id']); ?>">
                                <input type="hidden" name="pelajaran_id" value="<?php echo e($data['pelajaran_id']); ?>">
                                <input type="hidden" name="teacher_id" value="<?php echo e($data['teacher_id']); ?>">
                            </td>
                            <td>
                                <center><input class="form-check-input" type="checkbox" value="H" name="absen<?php echo e($student->id); ?>"></center>
                            </td>
                            <td>
                                <center><input class="form-check-input" type="checkbox" value="S" name="absen<?php echo e($student->id); ?>"></center>
                            </td>
                            <td>
                                <center><input class="form-check-input" type="checkbox" value="I" name="absen<?php echo e($student->id); ?>"></center>
                            </td>
                            <td>
                                <center><input class="form-check-input" type="checkbox" value="A" name="absen<?php echo e($student->id); ?>"></center>
                            </td>
                            <!-- <td>
                                <center> -->
                                        <!-- Button trigger modal -->
                                        <!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo e($student->id); ?>">
                                            Edit
                                        </button> -->

                                        <!-- Modal -->
                                        <!-- <div class="modal fade" id="exampleModal<?php echo e($student->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?php echo e($student->nama); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="absen">
                                                        <option selected value="H">Hadir</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                </center>
                            </td> -->
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td colspan="6"><button type="submit" class="btn btn-primary btn-sm">Simpan</button></td>
                        </tr>
                    </tbody>
                        </form>
                </table>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Kelas ini sudah di absen!</strong> Kamu sudah melakukan absensi di kelas ini.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

<!-- Content Row -->

</div>
<!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/absen/absen.blade.php ENDPATH**/ ?>