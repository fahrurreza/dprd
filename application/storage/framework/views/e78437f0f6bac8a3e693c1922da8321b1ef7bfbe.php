

<?php $__env->startSection('content'); ?>
<div class="container-fluid">               
    <form method="post" action="/user">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputName" name="name" placeholder="Nama" value="<?php echo e(old('name')); ?>">
                    <div class="invalid-feedback">
                        Tidak Boleh Kosong
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNIK" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="mail" class="form-control <?php $__errorArgs = ['mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputNIK" name="mail" placeholder="120505050505" value="<?php echo e(old('mail')); ?>">
                    <div class="invalid-feedback">
                        Tidak Boleh Kosong
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputAddress" name="password" placeholder="Password">
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
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\login\resources\views/user/create.blade.php ENDPATH**/ ?>