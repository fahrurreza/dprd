<form action="<?php echo e(url('/data')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col">
            Absensi Siswa : <?php echo e($data['tahun']->tahun); ?> - <?php echo e($data['tahun']->keterangan); ?>

            <input type="hidden" name="tahun_id" value="<?php echo e($data['tahun']->id); ?>">
        </div>
        <div class="col">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" name="kelas_id">
                <option disabled selected>Pilih..</option>
                <?php $__currentLoopData = $data['kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($kelas->id); ?>"><?php echo e($kelas->group); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> 
        </div>
        <div class="col">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Mapel</label>
                <select class="form-control" name="pelajaran_id">
                <option disabled selected>Pilih..</option>
                <?php $__currentLoopData = $data['pelajaran']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($data['hari'] != $kelas->hari): ?>
                <option value="<?php echo e($kelas->id); ?>"><?php echo e($kelas->pelajaran); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> 
        </div>
        <div class="col">
            <button class="btn btn-primary">Proses</button>
        </div>
    </div>
</form><?php /**PATH C:\xampp\htdocs\smk\resources\views/absen/form.blade.php ENDPATH**/ ?>