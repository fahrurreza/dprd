<?php if(Auth::user()->position == 'Administrator'): ?>
    <div class="card ">
        <div class="form my-2 mx-2">
            <form method="post" action="<?php echo e(url('/cari')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Tahun Ajaran</label>
                        <select id="inputState" class="form-control" name="tahun_id">
                            <option selected disabled>Pilih...</option>
                            <?php $__currentLoopData = $data['tahun']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tahun->id); ?>"><?php echo e($tahun->tahun); ?> - <?php echo e($tahun->keterangan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Tahun Ajaran</label>
                        <select id="inputState" class="form-control" name="group_id">
                            <option selected disabled>Pilih...</option>
                            <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kelas->id); ?>"><?php echo e($kelas->group); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 mt-3">
                        <button class="btn btn-primary mt-3" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <button class="btn btn-primary my-2" data-toggle="modal" data-target="#exampleModalCenter">Input Jadwal</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Input</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo e(url('/jadwal')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body text-left">
                    <div class="form-group">
                        <label>Hari</label>
                        <select class="form-control" name="hari">
                            <option selected disabled>Pilih...</option>
                            <option value="senin">senin</option>
                            <option value="selasa">selasa</option>
                            <option value="rabu">rabu</option>
                            <option value="kamis">kamis</option>
                            <option value="jumat">jumat</option>
                            <option value="sabtu">sabtu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jam Mulai</label>
                        <input type="time" class="form-control" name="mulai" autocomplete="off">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label>Jam Berakhir</label>
                        <input type="time" class="form-control" name="akhir" autocomplete="off">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label>T.A</label>
                        <select class="form-control" name="tahun_id">
                            <option selected disabled>Pilih...</option>
                            <?php $__currentLoopData = $data['tahun']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tahun->id); ?>"><?php echo e($tahun->tahun); ?> - <?php echo e($tahun->keterangan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="group_id">
                            <option selected disabled>Pilih...</option>
                            <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kelas->id); ?>"><?php echo e($kelas->group); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pelajaran</label>
                        <select class="form-control" name="pelajaran_id">
                            <option selected disabled>Pilih...</option>
                            <?php $__currentLoopData = $data['pelajaran']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelajaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pelajaran->id); ?>"><?php echo e($pelajaran->pelajaran); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Guru</label>
                        <select class="form-control" name="teacher_id">
                            <option selected disabled>Pilih...</option>
                            <?php $__currentLoopData = $data['teacher']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php else: ?>
    <div class="card ">
        <div class="form my-2 mx-2">
            <form method="post" action="<?php echo e(url('/cari')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="inputState">Tahun Ajaran</label>
                        <select id="inputState" class="form-control" name="tahun_id">
                            <option selected disabled>Pilih...</option>
                            <?php $__currentLoopData = $data['tahun']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tahun->id); ?>"><?php echo e($tahun->tahun); ?> - <?php echo e($tahun->keterangan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 mt-3">
                        <button class="btn btn-primary mt-3" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php if(session('status')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(session('status')); ?>

</div>
<?php elseif(session('status_error')): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e(session('status_error')); ?>

</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/jadwal/form.blade.php ENDPATH**/ ?>