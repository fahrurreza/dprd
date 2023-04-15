

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreatePartai()" id="button-create-Partai">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-partai" action="createPartai" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="partai_id">
          <div class="form-group">
            <label for="menu">Partai</label>
            <input class="form-control" type="text" name="partai" id="partai">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreatePartai()">Cancel</button>
        </form>
      </div>
      <form id="deletePartai" action="deletePartai" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="partai_id" id="delete_partai_id">
      </form>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Partai</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Partai</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['partai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($list->partai); ?></td>
                        <td>
                        <div class="badge badge-success" onclick="editPartai(<?php echo e($list->id); ?>, '<?php echo e($list->partai); ?>')">Edit</div>
                        <div class="badge badge-danger" onclick="deletePartai(<?php echo e($list->id); ?>)">Delete</div>
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

    function showFormCreatePartai(){
      $("#button-create-partai").addClass("d-none");
      $("#form-create-partai").removeClass("d-none");
    }


    function editPartai(id, partai){
      document.getElementById("form-create-partai").action = "updatePartai";
      $('#partai_id').val(id);
      $('#partai').val(partai);
      $("#button-create-partai").addClass("d-none");
      $("#form-create-partai").removeClass("d-none");
    }

    function deletePartai(id){
      $('#delete_partai_id').val(id);
      document.getElementById("deletePartai").submit();
      
    }


    function cancelFormCreatePartai(){
      $("#button-create-partai").removeClass("d-none");
      $("#form-create-partai").addClass("d-none");
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\htdocs\dprd\application\resources\views/admin/v_partai.blade.php ENDPATH**/ ?>