

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Aspirasi Masuk</p>
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Tanggal & Waktu</th>
                    <th>Status</th>
                    <th><center>Action</center></th>
                  </tr>  
                </thead>
                <tbody>
                  <?php $__currentLoopData = $data['aspirasi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($loop->iteration); ?></td>
                      <td><?php echo e($list->name); ?></td>
                      <td><?php echo e($list->created_at); ?></td>
                      <td><?php echo e($list->disposisi); ?></td>
                      <td>
                        <center>
                          <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton<?php echo e($loop->iteration); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih...
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton<?php echo e($loop->iteration); ?>">
                            <a class="dropdown-item" href="<?php echo e(url('admin-aspirasi/'.$list->id)); ?>">Lihat</a>
                            <?php if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2): ?>
                            <?php if($list->hasil == null && $list->disposisi != 'diterima'): ?>
                            <a class="dropdown-item" href="<?php echo e(url('admin-aspirasi-accept/'.$list->id)); ?>">Acept</a>
                            <?php elseif($list->hasil == null): ?>
                            <a class="dropdown-item" href="<?php echo e(url('admin-proses-aspirasi/'.$list->id)); ?>">Proses</a>
                            <?php endif; ?>
                            <?php endif; ?>
                          </div>
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

    function showFormCreate(){
      $("#button-create-anggota").addClass("d-none");
      $("#form-create-rapat").removeClass("d-none");
    }

    function selesai(id)
    {
      $.ajax({
          type : 'get',
          url : '<?php echo e(URL::to('admin-selesaikan-rapat')); ?>',
          data:{'id':id},
          success:function(data){
            if(data == true)
            {
              toastr.success("Success!");
              setInterval(function() {
                location.reload();
              }, 1500);
            }else{
              toastr.error("Gagal!");
            }
          }
      });
    }

    function editRapat(id){
      //
    }

    function deleteRapat(id){
      $('#delete_rapat_id').val(id);
      document.getElementById("deleteRapat").submit();
    }


    function cancelFormCreateRapat(){
      $("#button-create-anggota").removeClass("d-none");
      $("#form-create-rapat").addClass("d-none");
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dprd\application\resources\views/admin/v_aspirasi.blade.php ENDPATH**/ ?>