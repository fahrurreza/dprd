

<?php $__env->startSection('content'); ?>
<div class="my-5 mx-5">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Email</th>
                <?php if(Auth::user()->position == 'Kepsek'): ?>
                <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($list->nama); ?></td>
                <td><?php echo e($list->email); ?></td>
                <?php if(Auth::user()->position == 'Kepsek'): ?>
                <td>
                <center>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?php echo e($list->id); ?>">Detail</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter<?php echo e($list->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Data Guru <?php echo e($list->nama); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" name="nik" value="<?php echo e($list->nik); ?>" autocomplete="off" disabled>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo e($list->nama); ?>" disabled>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo e($list->email); ?>" disabled>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/teacher/laporan.blade.php ENDPATH**/ ?>