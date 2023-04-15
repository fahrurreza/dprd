

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreateRuangan()" id="button-create-Ruangan">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-ruangan" action="createRuangan" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="ruangan_id">
          <div class="form-group">
            <label for="ruangan">Nama Ruangan</label>
            <input class="form-control" type="text" name="ruangan" id="ruangan">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateRuangan()">Cancel</button>
        </form>
      </div>
      <form id="deleteRuangan" action="deleteRuangan" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="ruangan_id" id="delete_ruangan_id">
      </form>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Ruangan</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['ruangan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($list->nama); ?></td>
                        <td>
                        <div class="badge badge-success" onclick="editRuangan(<?php echo e($list->id); ?>, '<?php echo e($list->nama); ?>')">Edit</div>
                        <div class="badge badge-danger" onclick="deleteRuangan(<?php echo e($list->id); ?>)">Delete</div>
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

    function showFormCreateRuangan(){
      $("#button-create-Ruangan").addClass("d-none");
      $("#form-create-ruangan").removeClass("d-none");
    }


    function editRuangan(id, ruangan){
      document.getElementById("form-create-ruangan").action = "updateRuangan";
      $('#ruangan_id').val(id);
      $('#ruangan').val(ruangan);
      $("#button-create-Ruangan").addClass("d-none");
      $("#form-create-ruangan").removeClass("d-none");
    }

    function deleteRuangan(id){
      $('#delete_ruangan_id').val(id);
      document.getElementById("deleteRuangan").submit();
      
    }


    function cancelFormCreateRuangan(){
      $("#button-create-Ruangan").removeClass("d-none");
      $("#form-create-ruangan").addClass("d-none");
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER FUTREZ\htdocs\dprd\application\resources\views/admin/v_ruangan.blade.php ENDPATH**/ ?>