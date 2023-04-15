

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
    
    
    <?php echo $__env->make('score.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(count($data['absen']) == 0): ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Absensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if(count($data['siswa2']) == 0): ?>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nisn</th>
                            <th>Alamat</th>
                            <th>Mapel</th>
                            <th>Kelas</th>
                            <th>Nilai</th>
                            <th>Angka</th>
                            <th>Predikat</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <form action="<?php echo e(url('/score')); ?>" method="post">
                        <?php echo csrf_field(); ?> 
                        <?php $__currentLoopData = $data['siswa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <?php echo e($student->nama); ?>

                            </td>
                            <td>
                                <?php echo e($student->nisn); ?>

                            </td>
                            <td>
                                <?php echo e($student->alamat); ?>

                            </td>
                            <td>
                                <?php echo e($data['mapel']); ?>

                            </td>
                            <td>
                                <?php echo e($data['group']); ?>

                            </td>
                            
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nilai<?php echo e($student->id); ?>" placeholder="example : Sembilan Puluh">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="angka<?php echo e($student->id); ?>" placeholder="example : 90">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="predikat<?php echo e($student->id); ?>" placeholder="example : A">
                                </div>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <input type="hidden" name="student_id<?php echo e($student->id); ?>" value="<?php echo e($student->id); ?>">
                        <input type="hidden" name="group_id" value="<?php echo e($data['group_id']); ?>">
                        <input type="hidden" name="pelajaran_id" value="<?php echo e($data['pelajaran_id']); ?>">
                        <input type="hidden" name="teacher_id" value="<?php echo e($data['teacher_id']); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td colspan="6"><button type="submit" class="btn btn-primary btn-sm">Simpan</button></td>
                        </tr>
                    </form>
                    </tbody>
                </table>   
                    <?php else: ?>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nisn</th>
                            <th>Alamat</th>
                            <th>Mapel</th>
                            <th>Kelas</th>
                            <th>Nilai</th>
                            <th>Angka</th>
                            <th>Predikat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $data['score']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <?php echo e($student->nama); ?>

                            </td>
                            <td>
                                <?php echo e($student->nisn); ?>

                            </td>
                            <td>
                                <?php echo e($student->alamat); ?>

                            </td>
                            <td>
                                <?php echo e($data['mapel']); ?>

                            </td>
                            <td>
                                <?php echo e($data['group']); ?>

                            </td>
                            
                            <td>
                                <?php echo e($student->nilai); ?>

                            </td>
                            <td>
                            <?php echo e($student->angka); ?>

                            </td>
                            <td>
                            <?php echo e($student->predikat); ?>

                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo e($student->id); ?>">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo e($student->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Nilai <?php echo e($student->nama); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            <form action="<?php echo e(url('/score/'.$student->score_id)); ?>" method="post">
                                                <?php echo csrf_field(); ?> <?php echo method_field('patch'); ?>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="nilai" value="<?php echo e($student->nilai); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="angka" value="<?php echo e($student->angka); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="predikat" value="<?php echo e($student->predikat); ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <a class="btn btn-info" href="<?php echo e(url('score/'.$student->id)); ?>">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        <input type="hidden" name="student_id<?php echo e($student->id); ?>" value="<?php echo e($student->id); ?>">
                        <input type="hidden" name="group_id" value="<?php echo e($data['group_id']); ?>">
                        <input type="hidden" name="pelajaran_id" value="<?php echo e($data['pelajaran_id']); ?>">
                        <input type="hidden" name="teacher_id" value="<?php echo e($data['teacher_id']); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php endif; ?>
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
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/score/score.blade.php ENDPATH**/ ?>