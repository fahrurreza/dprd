

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                  <?php $__currentLoopData = $data['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($role->role); ?></td>
                    <td class="font-weight-medium">
                      <div class="btn badge badge-success" onclick="showAccess(<?php echo e($role->id); ?>)">Access</div>
                  </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php echo $__env->make('modal/formMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Access <span class="text-small">(Click Button <div class="badge badge-success">Access</div>)</span></h4>
            <div class="row mx-3" id="accessMenu">
              
            </div>
            <form id="formAccess" action="createAccess" method="post">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="menu_id" id="menu_id">
              <input type="hidden" name="role_id" id="role_id">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

  <script>
    function showAccess(id){
      $("#role_id").val(id);
      $.ajax({
          type : 'get',
          url : '<?php echo e(URL::to('accessMenu')); ?>',
          data:{'id':id},
          success:function(data){
            $('#accessMenu').html(data);
          }
      });
    }

    function createAccess(id){
      $("#menu_id").val(id);
      $("#formAccess").submit();
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\htdocs\dprd\application\resources\views/admin/v_rolemenu.blade.php ENDPATH**/ ?>