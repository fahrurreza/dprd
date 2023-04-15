

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new user <i class="icon-circle-plus"></i></button>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                  <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td class="font-weight-bold"><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->role->role); ?></td>
                    <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php echo $__env->make('modal/formUser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Hak Akses</h4>
            <div class="list-wrapper pt-2">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                <?php $__currentLoopData = $data['role']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <div class="form-check form-check-flat">
                      <?php echo e($role->role); ?>

                  </div>
                  <i class="remove ti-close" onclick="deleteRole(<?php echo e($role->id); ?>)"></i>
                </li>
                <form id="deleteRole" action="deleteRole" method="post">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="role_id" id="role_id">
                </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            
            <form class="d-inline" action="createRole" method="post">
              <?php echo csrf_field(); ?>
              <div class="d-flex mb-0 mt-2">
                  <input type="text" class="form-control todo-list-input"  placeholder="Add new role" name="role">
                  <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent" type="submit"><i class="icon-circle-plus"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

  <script>
    function deleteRole(id){
      $('#role_id').val(id);
      $("#deleteRole").submit();
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\htdocs\dprd\application\resources\views/admin/v_user.blade.php ENDPATH**/ ?>