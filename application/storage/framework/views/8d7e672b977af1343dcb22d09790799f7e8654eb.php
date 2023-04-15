

<?php $__env->startSection('content'); ?>
<div class="container-fluid">               
    <form>
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">No. Rekam Medik</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo e($patient->rm); ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo e($patient->name); ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNIK" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?php echo e($patient->nik); ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo e($patient->address); ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputBirthday" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" value="<?php echo e($patient->birthday); ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control"value="<?php echo e($patient->phone_no); ?>" readonly>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-warning my-2" href="<?php echo e(url('/patient')); ?>"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hospital\resources\views/patient/show.blade.php ENDPATH**/ ?>