

<?php $__env->startSection('content'); ?>
<div class="container-fluid">     
    <div class="modal-body">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo e($user->username); ?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNIK" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo e($user->email); ?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">User Level</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo e($user->position); ?>" disabled>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smk\resources\views/user/show.blade.php ENDPATH**/ ?>