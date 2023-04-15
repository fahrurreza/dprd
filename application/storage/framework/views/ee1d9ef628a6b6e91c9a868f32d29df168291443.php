

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreateOrganisasi()" id="button-create-organisasi">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-organisasi" action="createTugasPokok" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="organisasi_id">
          <div class="form-group">
            <label for="menu">Devisi</label>
            <select class="form-control" name="organisasi_id" id="organisasi_id">
                <?php $__currentLoopData = $data['organisasi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organisasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($organisasi->id); ?>"><?php echo e($organisasi->unit); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
              <label for="x">Fungsi</label>
              <input id="x" type="hidden" name="fungsi">
              <trix-editor input="x"></trix-editor>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateOrganisasi()">Cancel</button>
        </form>
      </div>
      <form id="deleteTugasPokok" action="deleteTugasPokok" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="tugaspokok_id" id="delete_tugaspokok_id">
      </form>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Tugas Pokok</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Organisasi</th>
                    <th>Tugas Pokok</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['tugaspokok']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($list->organisasi->unit); ?></td>
                        <td><?php echo $list->tugas; ?></td>
                        <td>
                          <div class="badge badge-danger" onclick="deleteOrganisasi(<?php echo e($list->id); ?>)">Delete</div>
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

    function showFormCreateOrganisasi(){
      $("#button-create-organisasi").addClass("d-none");
      $("#form-create-organisasi").removeClass("d-none");
    }


    function editOrganisasi(id, organisasi){
      document.getElementById("form-create-organisasi").action = "updateOrganisasi";
      $('#organisasi_id').val(id);
      $('#organisasi').val(organisasi);
      $("#button-create-organisasi").addClass("d-none");
      $("#form-create-organisasi").removeClass("d-none");
    }

    function deleteOrganisasi(id){
      $('#delete_tugaspokok_id').val(id);
      document.getElementById("deleteTugasPokok").submit();
      
    }


    function cancelFormCreateOrganisasi(){
      $("#button-create-organisasi").removeClass("d-none");
      $("#form-create-organisasi").addClass("d-none");
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER USER\htdocs\dprd\application\resources\views/admin/v_tugaspokok.blade.php ENDPATH**/ ?>