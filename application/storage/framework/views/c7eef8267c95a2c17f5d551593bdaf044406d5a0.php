

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <form class="pt-3" method="POST" action="<?php echo e(url('change-password')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password Lama">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password_new" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password_confirm" placeholder="Password Confirm">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" >UPDATE</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    </div>
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER MEDIFIRST\htdocs\dprd\application\resources\views/admin/v_change_password.blade.php ENDPATH**/ ?>