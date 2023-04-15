

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreatePendidikan()" id="button-create-pendidikan">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-pendidikan" action="createPendidikan" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="pendidikan_id">
          <div class="form-group">
            <label for="menu">Pendidikan</label>
            <input class="form-control" type="text" name="pendidikan" id="pendidikan">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateJabatan()">Cancel</button>
        </form>
      </div>
      <form id="deletePendidikan" action="deletePendidikan" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="pendidikan_id" id="delete_pendidikan_id">
      </form>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Komisi</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Komisi</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['pendidikan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($list->pendidikan); ?></td>
                        <td>
                        <div class="badge badge-success" onclick="editPendidikan(<?php echo e($list->id); ?>, '<?php echo e($list->pendidikan); ?>')">Edit</div>
                        <div class="badge badge-danger" onclick="deletePendidikan(<?php echo e($list->id); ?>)">Delete</div>
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

    function showFormCreatePendidikan(){
      $("#button-create-pendidikan").addClass("d-none");
      $("#form-create-pendidikan").removeClass("d-none");
    }


    function editPendidikan(id, pendidikan){
      document.getElementById("form-create-pendidikan").action = "updatePendidikan";
      $('#pendidikan_id').val(id);
      $('#pendidikan').val(pendidikan);
      $("#button-create-pendidikan").addClass("d-none");
      $("#form-create-pendidikan").removeClass("d-none");
    }

    function deletePendidikan(id){
      $('#delete_pendidikan_id').val(id);
      document.getElementById("deletePendidikan").submit();
      
    }


    function cancelFormCreatePendidikan(){
      $("#button-create-pendidikan").removeClass("d-none");
      $("#form-create-pendidikan").addClass("d-none");
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\htdocs\dprd\application\resources\views/admin/v_pendidikan.blade.php ENDPATH**/ ?>