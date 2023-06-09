

<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
      <?php if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2): ?>
      <div class="col-md-12 my-3">
        <button class="btn btn-primary" onclick="showFormCreate()" id="button-create-rapat">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-rapat" action="createRapat" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="rapat_id">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Nama Rapat</label>
                <select name="nama_rapat" class="form-control" id="nama_rapat" onchange="setSifatRapat();">
                  <option disabled selected>Pilih...</option>
                  <option value="Paripurna">Paripurna</option>
                  <option value="Rapat Gabungan Komisi">Rapat Gabungan Komisi</option>
                  <option value="Rapat AKD">Rapat AKD</option>
                </select>
              </div>
              <div class="form-group">
                <label>Acara Rapat</label>
                <input class="form-control" type="text" name="acara_rapat" id="acara_rapat">
              </div>
              <div class="form-group">
                <label>Tanggal Rapat</label>
                <input class="form-control" type="date" name="tgl_rapat" id="tgl_rapat">
              </div>
              <div class="form-group">
                <label>Waktu Rapat</label>
                <input class="form-control" type="time" name="waktu_rapat" id="waktu_rapat">
              </div>
              <div class="form-group">
                <label>Ruangan Rapat</label>
                <input class="form-control" type="text" name="ruang_rapat" id="ruang_rapat">
              </div>
              <div class="form-group">
                <label>Peserta Rapat</label>
                <input class="form-control" type="text" name="peserta_rapat" id="peserta_rapat">
              </div>
              <div class="form-group">
                <label>Sifat Rapat</label>
                <select name="sifat_rapat" class="form-control" id="sifat_rapat">
                  <option value="1">segera</option>
                  <option value="2">biasa</option>
                </select>
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary mr-2" id="submit_rapat">Submit</button>
          <button class="btn btn-success" type="button" onclick="cancelFormCreateRapat()">Cancel</button>
        </form>
      </div>
      <form id="deleteRapat" action="deleteRapat" method="post">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="rapat_id" id="delete_rapat_id">
      </form>
      <?php endif; ?>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Jadwal Rapat</p>
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal & Waktu</th>
                    <th>Status</th>
                    <?php if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2): ?>
                    <th><center>Action</center></th>
                    <?php endif; ?>
                  </tr>  
                </thead>
                <tbody>
                <?php $__currentLoopData = $data['rapat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($list->nama_rapat); ?></td>
                        <td><?php echo e($list->waktu); ?></td>
                        <td>
                          <div class="<?php echo e($list->is_selesai == true ? 'badge badge-success' : 'badge badge-danger'); ?>"><?php echo e($list->is_selesai == true ? 'selesai' : 'belum selesai'); ?></div>
                        </td>
                        <?php if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2): ?>
                        <td>
                            <center>
                              <div class="badge badge-info" onclick="detail(<?php echo e($list->id); ?>)">Lihat</div>
                              <div class="badge badge-primary disable" onclick="selesai(<?php echo e($list->id); ?>)">Selesaikan</div>
                              <div class="badge badge-success" onclick="editRapat(<?php echo e($list->id); ?>)">Edit</div>
                              <div class="badge badge-danger" onclick="deleteRapat(<?php echo e($list->id); ?>)">Delete</div>
                            </center>
                        </td>
                        <?php endif; ?>
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
      $("#submit_rapat").removeClass("d-none");
      $("#form-create-rapat").removeClass("d-none");

      $.ajax({
          type : 'get',
          url : '<?php echo e(URL::to('editRapat')); ?>',
          data:{'id':id},
          success:function(data){

            function dateFormat(timestamp){
              const d   = new Date(timestamp);
              let year  = d.getFullYear();
              let month = d.getMonth() + 1;
              let date  = d.getDate();

              date = date
                    .toString()
                    .padStart(2, '0');

              month = month
                  .toString()
                  .padStart(2, '0');

              return year+'-'+month+'-'+date;
            }

            function time(timestamp){
              let today = new Date(timestamp);
              let hour  = today.getHours();
              let minute = today.getMinutes();
              let second = today.getSeconds();

              minute = minute
                    .toString()
                    .padStart(2, '0');

              second = second
                  .toString()
                  .padStart(2, '0');

              return hour+':'+minute+':'+second;
            }
            $('#rapat_id').val(id);
            document.getElementById("form-create-rapat").action = "updateRapat";
            document.getElementById("nama_rapat").value = data.nama_rapat;
            $('#acara_rapat').val(data.acara_rapat);
            document.getElementById("tgl_rapat").value = dateFormat(data.waktu);
            document.getElementById("waktu_rapat").value = time(data.waktu);
            $('#ruang_rapat').val(data.ruang_rapat);
            $('#peserta_rapat').val(data.peserta_rapat);
            document.getElementById("sifat_rapat").value = data.sifat_rapat;
            $("#button-create-rapat").addClass("d-none");
            $("#form-create-rapat").removeClass("d-none");
          }
      });
    }

    function deleteRapat(id){
      $('#delete_rapat_id').val(id);
      document.getElementById("deleteRapat").submit();
    }


    function cancelFormCreateRapat(){
      $("#button-create-anggota").removeClass("d-none");
      $("#form-create-rapat").addClass("d-none");
    }

    function setSifatRapat(){
      var value = $("#nama_rapat option:selected").val();
      if(value == 'Paripurna'){
        document.getElementById("sifat_rapat").value = 1;
        document.getElementById("sifat_rapat").disabled = true;
      }
    }

    function detail(id){
      $.ajax({
          type : 'get',
          url : '<?php echo e(URL::to('editRapat')); ?>',
          data:{'id':id},
          success:function(data){

            function dateFormat(timestamp){
              const d   = new Date(timestamp);
              let year  = d.getFullYear();
              let month = d.getMonth() + 1;
              let date  = d.getDate();

              date = date
                    .toString()
                    .padStart(2, '0');

              month = month
                  .toString()
                  .padStart(2, '0');

              return year+'-'+month+'-'+date;
            }

            function time(timestamp){
              let today = new Date(timestamp);
              let hour  = today.getHours();
              let minute = today.getMinutes();
              let second = today.getSeconds();

              minute = minute
                    .toString()
                    .padStart(2, '0');

              second = second
                  .toString()
                  .padStart(2, '0');

              return hour+':'+minute+':'+second;
            }

            document.getElementById("tgl_rapat").disabled = true;
            document.getElementById("waktu_rapat").disabled = true;
            document.getElementById("sifat_rapat").disabled = true;
            document.getElementById("nama_rapat").disabled = true;
            document.getElementById("tgl_rapat").disabled = true;
            document.getElementById("waktu_rapat").disabled = true;
            document.getElementById("sifat_rapat").disabled = true;
            document.getElementById("acara_rapat").disabled = true;
            document.getElementById("ruang_rapat").disabled = true;
            document.getElementById("peserta_rapat").disabled = true;

            $('#rapat_id').val(id);
            document.getElementById("form-create-rapat").action = "updateRapat";
            document.getElementById("nama_rapat").value = data.nama_rapat;
            $('#acara_rapat').val(data.acara_rapat);
            document.getElementById("tgl_rapat").value = dateFormat(data.waktu);
            document.getElementById("waktu_rapat").value = time(data.waktu);
            $('#ruang_rapat').val(data.rua);
            $('#peserta_rapat').val(data.peserta_rapat);
            document.getElementById("sifat_rapat").value = data.sifat_rapat;

            $('#rapat_id').val(id);
            document.getElementById("form-create-rapat").action = "updateRapat";
            document.getElementById("nama_rapat").value = data.nama_rapat;
            $('#acara_rapat').val(data.acara_rapat);
            document.getElementById("tgl_rapat").value = dateFormat(data.waktu);
            document.getElementById("waktu_rapat").value = time(data.waktu);
            $('#ruang_rapat').val(data.ruang_rapat);
            $('#peserta_rapat').val(data.peserta_rapat);
            document.getElementById("sifat_rapat").value = data.sifat_rapat;
            $("#submit_rapat").addClass("d-none");
            $("#button-create-rapat").addClass("d-none");
            $("#form-create-rapat").removeClass("d-none");
          }
      });
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dprd\application\resources\views/admin/v_rapat.blade.php ENDPATH**/ ?>