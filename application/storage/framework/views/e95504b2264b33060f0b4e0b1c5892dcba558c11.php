

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-12 my-3">
        <button class="btn btn-primary" onclick="showFormCreateAnggota()" id="button-create-anggota">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-anggota" action="createAnggota" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="anggota_id">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="menu">NIP</label>
                <input class="form-control" type="number" name="nip" id="nip">
              </div>
              <div class="form-group">
                <label for="menu">Nama</label>
                <input class="form-control" type="text" name="nama" id="nama">
              </div>
              <div class="form-group">
                <label for="menu">Tempat Lahir</label>
                <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir">
              </div>
              <div class="form-group">
                <label for="menu">Tanggl Lahir</label>
                <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir">
              </div>
              <div class="form-group">
                <label for="menu">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="9"></textarea>
              </div>
              
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="menu">Pendidikan</label>
                <select class="form-control" name="pendidikan_id" id="pendidikan_id">
                    <?php $__currentLoopData = $data['pendidikan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendidikan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pendidikan->id); ?>"><?php echo e($pendidikan->pendidikan); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="menu">Jabatan</label>
                <select class="form-control" name="jabatan_id" id="jabatan_id">
                    <?php $__currentLoopData = $data['jabatan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jabatan->id); ?>"><?php echo e($jabatan->jabatan); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="menu">Partai</label>
                <select class="form-control" name="partai_id" id="partai_id">
                    <?php $__currentLoopData = $data['partai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($partai->id); ?>"><?php echo e($partai->partai); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="menu">Komisi</label>
                <select class="form-control" name="komisi_id" id="komisi_id">
                    <?php $__currentLoopData = $data['komisi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($komisi->id); ?>"><?php echo e($komisi->komisi); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="menu">Periode Awal</label>
                <input class="form-control" type="date" name="awal" id="awal">
              </div>
              <div class="form-group">
                <label for="menu">Periode Akhir</label>
                <input class="form-control" type="date" name="akhir" id="akhir">
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateAnggota()">Cancel</button>
        </form>
      </div>
      <form id="deleteAnggota" action="deleteAnggota" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="anggota_id" id="delete_anggota_id">
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
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['anggota']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($list->nama); ?></td>
                        <td><?php echo e($list->jabatan->jabatan); ?></td>
                        <td>
                            <div class="badge badge-primary" onclick="detailAnggota(<?php echo e($list->id); ?>)">Detail</div>
                            <div class="badge badge-success" onclick="editAnggota(<?php echo e($list->id); ?>)">Edit</div>
                            <div class="badge badge-danger" onclick="deleteAnggota(<?php echo e($list->id); ?>)">Delete</div>
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

    function showFormCreateAnggota(){
      $("#button-create-anggota").addClass("d-none");
      $("#form-create-anggota").removeClass("d-none");
    }


    function editAnggota(id, komisi){
      document.getElementById("form-create-anggota").action = "updateKomisi";
      $('#komisi_id').val(id);
      $('#komisi').val(komisi);
      $("#button-create-anggota").addClass("d-none");
      $("#form-create-anggota").removeClass("d-none");
    }

    function deleteAnggota(id){
      $('#delete_anggota_id').val(id);
      document.getElementById("deleteAnggota").submit();
    }


    function cancelFormCreateAnggota(){
      $("#button-create-anggota").removeClass("d-none");
      $("#form-create-anggota").addClass("d-none");
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER MEDIFIRST\htdocs\dprd\application\resources\views/admin/v_anggota.blade.php ENDPATH**/ ?>