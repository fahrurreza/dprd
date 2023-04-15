

<?php $__env->startSection('content'); ?>
<div class="container-fluid">               
    <form method="post" action="/rwj">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputRM" class="col-sm-2 col-form-label">No. Rekam Medik</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputRM" name="rm" value="<?php echo e($patient->rm); ?>" readonly>
                    <input type="hidden" class="form-control" id="inputRM" name="id" value="<?php echo e($patient->id); ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="name" value="<?php echo e($patient->name); ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputFrom" class="col-sm-2 col-form-label">Datang Dari :</label>
                <div class="col-sm-10">
                    <select type="number" class="form-control js-example-basic-single <?php $__errorArgs = ['from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputFrom" name="from">
                    <option disabled selected>Pilih satu</option>
                    <option value="Walk In">Walk In</option>
                    <option value="Other Hospital">Other Hospital</option>
                    </select>
                    <div class="invalid-feedback">
                        Tidak Boleh Kosong
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputBill" class="col-sm-2 col-form-label">Bill To :</label>
                <div class="col-sm-10">
                    <select type="number" class="form-control js-example-basic-single <?php $__errorArgs = ['bill_to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputBill" name="bill_to">
                    <option disabled selected>Pilih satu</option>
                    <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asuransi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($asuransi->id); ?>"><?php echo e($asuransi->asuransi); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback">
                        Tidak Boleh Kosong
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNo" class="col-sm-2 col-form-label">Nomor Asuransi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php $__errorArgs = ['asurance_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputNo" name="asurance_no" placeholder="nomor kartu asuransi / bpjs">
                    <small id="emailHelp" class="form-text text-muted">Jika Pasien Umum, lebih baik tidak diisi.</small>
                    <div class="invalid-feedback">
                        Jika bukan pasien umum, wajib mengisi nomor
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDokter" class="col-sm-2 col-form-label">Dokter :</label>
                <div class="col-sm-10">
                    <select type="number" class="form-control js-example-basic-single <?php $__errorArgs = ['docter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputDokter" name="docter">
                    <option disabled selected>Pilih satu</option>
                    <?php $__currentLoopData = $docters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($docter->id); ?>"><?php echo e($docter->docter); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback">
                        Tidak Boleh Kosong
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <a class="btn btn-warning my-2" href="<?php echo e(url('/patient')); ?>"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Post</button>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hospital\resources\views/rwj/create.blade.php ENDPATH**/ ?>