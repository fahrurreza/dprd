

<?php $__env->startSection('content'); ?>
<div class="container-fluid">               
    <form method="post" action="<?php echo e(url('user/'.$user->id)); ?>">
        <?php echo csrf_field(); ?> <?php echo method_field('patch'); ?>
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNIK" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="new_password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Comfirm New Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="confirm_password">
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
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/user/edit.blade.php ENDPATH**/ ?>