

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreateJabatan()" id="button-create-jabatan">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-jabatan" action="createJabatan" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="jabatan_id">
          <div class="form-group">
            <label for="menu">Jabatan</label>
            <input class="form-control" type="text" name="jabatan" id="jabatan">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateJabatan()">Cancel</button>
        </form>
      </div>
      <form id="deleteJabatan" action="deleteJabatan" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="jabatan_id" id="delete_jabatan_id">
      </form>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Jabatan</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['jabatan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($list->jabatan); ?></td>
                        <td>
                        <div class="badge badge-success" onclick="editJabatan(<?php echo e($list->id); ?>, '<?php echo e($list->jabatan); ?>')">Edit</div>
                        <div class="badge badge-danger" onclick="deleteJabatan(<?php echo e($list->id); ?>)">Delete</div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <!-- content-wrapper ends -->

  <script>

    function showFormCreateJabatan(){
      $("#button-create-jabatan").addClass("d-none");
      $("#form-create-jabatan").removeClass("d-none");
    }


    function editJabatan(id, jabatan){
      document.getElementById("form-create-jabatan").action = "updateJabatan";
      $('#jabatan_id').val(id);
      $('#jabatan').val(jabatan);
      $("#button-create-jabatan").addClass("d-none");
      $("#form-create-jabatan").removeClass("d-none");
    }

    function deleteJabatan(id){
      $('#delete_jabatan_id').val(id);
      document.getElementById("deleteJabatan").submit();
      
    }


    function cancelFormCreateJabatan(){
      $("#button-create-jabatan").removeClass("d-none");
      $("#form-create-jabatan").addClass("d-none");
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER MEDIFIRST\htdocs\dprd\application\resources\views/admin/v_jabatan.blade.php ENDPATH**/ ?>