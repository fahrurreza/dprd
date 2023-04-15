<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title>DPRD KOTA BINJAI - Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo e(asset('adm/vendors/feather/feather.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adm/vendors/ti-icons/css/themify-icons.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adm/vendors/css/vendor.bundle.base.css')); ?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo e(asset('adm/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adm/vendors/ti-icons/css/themify-icons.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adm/vendors/mdi/css/materialdesignicons.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('adm/js/select.dataTables.min.css')); ?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo e(asset('adm/css/vertical-layout-light/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adm/css/toastr.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('adm/trix/trix.css')); ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo e(asset('adm/images/logo-dprd-small.png')); ?>" />
  <link rel="shortcut icon" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
  <link rel="shortcut icon" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  
  
    


  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
      display:none;
    }
  </style>
  
</head>
<body>
  <div class="container-scroller">
    <?php echo $__env->make('template/admin/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php echo $__env->make('template/admin/setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php echo $__env->make('template/admin/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- partial -->
      <?php echo $__env->yieldContent('content'); ?>
      
        <!-- content-wrapper ends -->
        <?php echo $__env->make('template/admin/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo e(asset('adm/cute-alert-master/cute-alert.js')); ?>">></script>
  <script src="<?php echo e(asset('adm/vendors/js/vendor.bundle.base.js')); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo e(asset('adm/vendors/chart.js/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/vendors/datatables.net/jquery.dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/vendors/datatables.net-bs4/dataTables.bootstrap4.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/js/dataTables.select.min.js')); ?>"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo e(asset('adm/js/off-canvas.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/js/hoverable-collapse.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/js/settings.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/js/file-upload.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/trix/trix.js')); ?>"></script>
  <script src="<?php echo e(asset('adm/js/toastr.js')); ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo e(asset('adm/js/Chart.roundedBarCharts.js')); ?>"></script>
  
  
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>


  <!-- End custom js for this page-->
</body>

</html><?php /**PATH D:\SERVER FUTREZ\htdocs\dprd\application\resources\views/template/admin/master.blade.php ENDPATH**/ ?>