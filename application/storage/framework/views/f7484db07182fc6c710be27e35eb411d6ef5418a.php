

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
    <?php if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2): ?>
      <div class="col-md-12 my-3">
        <form class="forms-sample d-none" id="form-create-rapat" action="createHasilRapat" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="rapat_id" id="rapat_id">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" type="text" name="keterangan_rapat" id="keterangan_rapat">
              </div>
              <div class="form-group">
                <label for="route">Hasil</label>
                <input type="file" name="hasil" class="form-control" accept=".doc, .docx, .pdf">
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateRapat()">Cancel</button>
        </form>
      </div>
      <form id="deleteHasilRapat" action="deleteHasilRapat" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="rapat_id" id="delete_rapat_id">
      </form>
      <?php endif; ?>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Hasil Rapat</p>
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal & Waktu</th>
                    <th><center>Action</center></th>
                  </tr>  
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['rapat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($list->nama_rapat); ?></td>
                        <td><?php echo e(date_format($list->created_at, 'd-m-Y H:i')); ?></td>
                        <td>
                            <center>
                              <?php if($list->hasil == null and Auth::user()->role_id == 1 or Auth::user()->role_id == 2): ?>
                              <div class="badge badge-success" onclick="showFormCreate(<?php echo e($list->id); ?>)">Input Hasil</div>
                              <?php elseif($list->hasil != null and Auth::user()->role_id == 1 or Auth::user()->role_id == 2): ?>
                              <div class="badge badge-danger" onclick="deleteRapat(<?php echo e($list->id); ?>)">Hapus Hasil</div>
                              <?php elseif($list->hasil == null and Auth::user()->role_id != 1 and Auth::user()->role_id != 2): ?>
                              <div class="badge badge-info">Belum ada hasil</div>
                              <?php else: ?>
                              <a class="badge badge-warning" href="<?php echo e(asset('adm/document/'.$list->hasil)); ?>" download>Download Hasil</a>
                              <?php endif; ?>
                            </center>
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

    function showFormCreate(id){
      $('#rapat_id').val(id);
      $("#button-create-anggota").addClass("d-none");
      $("#form-create-rapat").removeClass("d-none");

    }


    function editRapat(id){
      //
    }

    function deleteRapat(id){
      console.log(id);
      $('#delete_rapat_id').val(id);
      document.getElementById("deleteHasilRapat").submit();
    }


    function cancelFormCreateRapat(){
      $("#button-create-anggota").removeClass("d-none");
      $("#form-create-rapat").addClass("d-none");
    }

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER MEDIFIRST\htdocs\dprd\application\resources\views/admin/v_hasilrapat.blade.php ENDPATH**/ ?>