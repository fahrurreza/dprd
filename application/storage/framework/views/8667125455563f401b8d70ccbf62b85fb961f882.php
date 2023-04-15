

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
            <p class="card-title mb-0">Arsip Hasil Rapat</p>
            
            <div class="row mt-3">
              <?php $__currentLoopData = $data['rapat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(extensi($doc->hasil) == 'pdf'): ?>
                  <a class="btn btn-light text-center mx-2" href="<?php echo e(asset('adm/document/'.$doc->hasil)); ?>" download>
                    <i class="mdi mdi-file-pdf text-danger" style="font-size: 150px"></i>
                    <p style="margin-top : -20px"><?php echo e($doc->hasil); ?></p>
                  </a>
                <?php else: ?>
                  <a class="btn btn-light text-center mx-2" href="<?php echo e(asset('adm/document/'.$doc->hasil)); ?>" download>
                    <i class="mdi mdi-file-word text-primary" style="font-size: 150px"></i>
                    <p style="margin-top : -20px"><?php echo e($doc->hasil); ?></p>
                  </a>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER MEDIFIRST\htdocs\dprd\application\resources\views/admin/v_arsiprapat.blade.php ENDPATH**/ ?>