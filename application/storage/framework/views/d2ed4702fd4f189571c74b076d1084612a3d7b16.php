

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <button class="btn btn-primary" onclick="showFormCreateMenu()" id="button-create-menu">Add new menu <i class="icon-circle-plus"></i></button>
            <form class="forms-sample d-none" id="form-create-menu" action="createMenu" method="post">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="menu_id" id="menu_id">
              <div class="form-group">
                <label for="menu">Menu</label>
                <input type="text" class="form-control" id="menu" placeholder="Menu" name="menu">
              </div>
              <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" id="icon" placeholder="Icon Code" name="icon">
              </div>
              <div class="form-group">
                <label for="route">Route</label>
                <input type="text" class="form-control" id="route" placeholder="Route" name="route">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light" type="button" onclick="cancelFormCreateMenu()">Cancel</button>
            </form>
            <form id="deleteMenu" action="deleteMenu" method="post">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="menu_id" id="del_menu_id">
            </form>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Icon</th>
                    <th>Route</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                  <?php $__currentLoopData = $data['menus']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($menu->menu); ?></td>
                    <td><i class="<?php echo $menu->icon; ?>"></i></td>
                    <td><?php echo e($menu->route); ?></td>
                    <td class="font-weight-medium">
                      <div class="btn badge badge-primary" onclick="showSubmenu(<?php echo e($menu->id); ?>)">Submenu</div>
                      <div class="btn badge badge-success" onclick="editFormMenu(<?php echo e($menu->id); ?>)">Edit</div>
                      <div class="btn badge badge-danger" onclick="deleteMenu(<?php echo e($menu->id); ?>)">Delete</div>
                  </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php echo $__env->make('modal/formMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Submenu <span class="text-small">(Click Show)</span></h4>
            <button class="btn btn-primary d-none" onclick="showFormCreateSubmenu()" id="button-create-submenu">Add new submenu <i class="icon-circle-plus"></i></button>
            
            <div class="list-wrapper pt-2">
              <form class="forms-sample d-none" id="form-create-submenu" action="createSubmenu" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="menu_id" id="menu_id_value">
                <div class="form-group">
                  <label for="submenu_value">Submenu</label>
                  <input type="text" class="form-control" id="submenu_value" placeholder="Submenu" name="submenu">
                </div>
                <div class="form-group">
                  <label for="route">Route</label>
                  <input type="text" class="form-control" id="route" placeholder="Route" name="route">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="cancelFormCreateSubmenu()">Cancel</button>
              </form>
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom" id="submenu">
                
              </ul>
              <form id="deleteSubmenu" action="deleteSubmenu" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="submenu_id" id="submenu_id">
              </form>
            </div>
            
            <!-- <form class="d-inline" action="createSubmenu" method="post">
              <?php echo csrf_field(); ?>
              <div class="d-flex mb-0 mt-2">
                  <input type="hidden" name="menu_id" id="menu_id">
                  <input type="text" class="form-control todo-list-input"  placeholder="Add new submenu" name="submenu">
                  <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent" type="submit"><i class="icon-circle-plus"></i></button>
              </div>
            </form> -->
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

    function showFormCreateMenu(){
      $("#button-create-menu").addClass("d-none");
      $("#form-create-menu").removeClass("d-none");
    }

    function cancelFormCreateMenu(){
      $("#button-create-menu").removeClass("d-none");
      $("#form-create-menu").addClass("d-none");
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

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dprd\application\resources\views/admin/v_menu.blade.php ENDPATH**/ ?>