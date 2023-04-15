<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo e(asset('adm/vendors/feather/feather.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adm/vendors/ti-icons/css/themify-icons.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adm/vendors/css/vendor.bundle.base.css')); ?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo e(asset('adm/css/vertical-layout-light/style.css')); ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo e(asset('adm/images/favicon.png')); ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo e(asset('adm/images/logo-dprd.png')); ?>" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign Up to Login</h6>
              <form class="pt-3" method="POST" action="<?php echo e(route('registrasi')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" name="nik" placeholder="NIK" minlength="16" maxlength="16" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password_confirm" placeholder="Password Confirm" required>
                </div>
                <div class="mt-3">
                  <a href="<?php echo e(url('login')); ?>" class="btn btn-success btn-lg font-weight-medium auth-form-btn" type="submit" >KEMBALI</a>
                  <button class="btn btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" >DAFTAR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo e(asset('adm/vendors/js/vendor.bundle.base.js')); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo e(asset('adm/js/off-canvas.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/js/hoverable-collapse.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/js/template.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/js/settings.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/js/todolist.js')); ?>"></script>
  <!-- endinject -->
</body>

</html><?php /**PATH D:\SERVER MEDIFIRST\htdocs\dprd\application\resources\views/auth/registrasi.blade.php ENDPATH**/ ?>