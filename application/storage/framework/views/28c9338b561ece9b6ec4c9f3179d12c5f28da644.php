

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-12 my-3">
        <button class="btn btn-primary" onclick="showFormCreateVisiMisi()" id="button-create-visimisi">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-visimisi" action="createVisimisi" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="visimisi_id">
          <div class="form-group">
            <label for="menu">Content</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label for="jenis">Jenis</label>
            <select class="form-control" name="jenis" id="jenis">
              <option value="visi">visi</option>
              <option value="misi">misi</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateMenu()">Cancel</button>
        </form>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Visi</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Visi</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                  <?php $__currentLoopData = $data['visi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td class="font-weight-bold"><?php echo e($visi->deskripsi); ?></td>
                    <td class="font-weight-medium">
                      <div class="badge badge-success" onclick="editVisimisi(<?php echo e($visi->id); ?>, '<?php echo e($visi->deskripsi); ?>', '<?php echo e($visi->jenis); ?>')">Edit</div>
                      <form class="d-inline" action="deleteVisimisi" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($visi->id); ?>">
                        <button class="badge badge-danger" type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <p class="card-title mb-0">Data Misi</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Misi</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                  <?php $__currentLoopData = $data['misi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $misi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td class="font-weight-bold"><?php echo e($misi->deskripsi); ?></td>
                    <td class="font-weight-medium">
                      <div class="badge badge-success" onclick="editVisimisi(<?php echo e($misi->id); ?>, '<?php echo e($misi->deskripsi); ?>', '<?php echo e($misi->jenis); ?>')">Edit</div>
                      <form class="d-inline" action="deleteVisimisi" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($misi->id); ?>">
                        <button class="badge badge-danger" type="submit">Delete</button>
                      </form>
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
    function showSubmenu(id){
      $('#menu_id_value').val(id);
      $("#button-create-submenu").removeClass("d-none");
      $("#form-create-submenu").addClass("d-none");
      $.ajax({
          type : 'get',
          url : '<?php echo e(URL::to('showSubmenu')); ?>',
          data:{'id':id},
          success:function(data){
            $('#submenu').html(data);
          }
      });
    }

    function deleteSubmenu(id){
      $('#submenu_id').val(id);
      $("#deleteSubmenu").submit();
    }

    function showFormCreateVisiMisi(){
      $("#button-create-menu").addClass("d-none");
      $("#form-create-visimisi").removeClass("d-none");
    }

    function cancelFormCreateMenu(){
      $("#button-create-menu").removeClass("d-none");
      $("#form-create-menu").addClass("d-none");
    }

    function editVisimisi(id, deskripsi, jenis){
      document.getElementById("form-create-visimisi").action = "updateVisimisi";
      $('#visimisi_id').val(id);
      $('#deskripsi').val(deskripsi);
      document.getElementById("jenis").value = jenis;
      $("#button-create-visimisi").addClass("d-none");
      $("#form-create-visimisi").removeClass("d-none");
    }

    function editFormMenu(id){
      $.ajax({
          type : 'get',
          url : '<?php echo e(URL::to('editMenu')); ?>',
          data:{'id':id},
          success:function(data){
            document.getElementById("form-create-menu").action = "updateMenu";
            $('#menu').val(data.menu);
            $('#icon').val(data.icon);
            $('#route').val(data.route);
            $('#menu_id').val(id);
            $("#button-create-menu").addClass("d-none");
            $("#form-create-menu").removeClass("d-none");
          }
      });
    }

    function deleteMenu(id){
      $('#del_menu_id').val(id);
      $("#deleteMenu").submit();
    }


    //Submenu
    function showFormCreateSubmenu(){
      $("#button-create-submenu").addClass("d-none");
      $("#form-create-submenu").removeClass("d-none");
      $('#submenu').html("");
    }

    function cancelFormCreateSubmenu(){
      $("#button-create-submenu").removeClass("d-none");
      $("#form-create-submenu").addClass("d-none");
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dprd\application\resources\views/admin/v_visimisi.blade.php ENDPATH**/ ?>