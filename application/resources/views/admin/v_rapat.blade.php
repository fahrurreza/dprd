@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
      <div class="col-md-12 my-3">
        <button class="btn btn-primary" onclick="showFormCreate()" id="button-create-rapat">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-rapat" action="createRapat" method="post">
          @csrf
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
                <select name="ruangan_id" class="form-control" id="ruangan_id" require>
                  <option disabled selected>Pilih...</option>
                  @foreach($data['ruangan'] as $option)
                  <option value="{{$option->id}}">{{$option->nama}}</option>
                  @endforeach
                </select>
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
        @csrf
        <input type="hidden" name="rapat_id" id="delete_rapat_id">
      </form>
      @endif
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
                    @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
                    <th><center>Actions</center></th>
                    @endif
                  </tr>  
                </thead>
                <tbody>
                @foreach($data['rapat'] as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->nama_rapat}}</td>
                        <td>{{$list->waktu}}</td>
                        <td>
                          <div class="{{$list->is_selesai == true ? 'badge badge-success' : 'badge badge-danger' }}">{{$list->is_selesai == true ? 'selesai' : 'belum selesai' }}</div>
                        </td>
                        @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
                        <td>
                            <center>
                              <div class="badge badge-info" onclick="detail({{$list->id}})">Lihat</div>
                              <div class="badge badge-primary disable" onclick="selesai({{$list->id}})">Selesaikan</div>
                              <div class="badge badge-success" onclick="editRapat({{$list->id}})">Edit</div>
                              <div class="badge badge-danger" onclick="deleteRapat({{$list->id}})">Delete</div>
                            </center>
                        </td>
                        @endif
                    </tr>
                    @endforeach
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
          url : '{{URL::to('admin-selesaikan-rapat')}}',
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
          url : '{{URL::to('editRapat')}}',
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
            console.log(data.ruangan_id);
            $('#rapat_id').val(id);
            document.getElementById("form-create-rapat").action = "updateRapat";
            document.getElementById("nama_rapat").value = data.nama_rapat;
            $('#acara_rapat').val(data.acara_rapat);
            document.getElementById("tgl_rapat").value = dateFormat(data.waktu);
            document.getElementById("waktu_rapat").value = time(data.waktu);
            document.getElementById("ruangan_id").value = data.ruangan_id;
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
      }else{
        const ruangan_id = $('select[name=ruangan_id] option').filter(':selected').val()
        document.getElementById("sifat_rapat").value = ruangan_id;
        document.getElementById("sifat_rapat").disabled = false;
      }
    }

    function detail(id){
      $("#submit_rapat").addClass("d-none");
      $("#form-create-rapat").removeClass("d-none");

      $.ajax({
          type : 'get',
          url : '{{URL::to('editRapat')}}',
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
            document.getElementById("ruangan_id").disabled = true;
            document.getElementById("peserta_rapat").disabled = true;

            $('#rapat_id').val(id);
            document.getElementById("form-create-rapat").action = "updateRapat";
            document.getElementById("nama_rapat").value = data.nama_rapat;
            $('#acara_rapat').val(data.acara_rapat);
            document.getElementById("tgl_rapat").value = dateFormat(data.waktu);
            document.getElementById("waktu_rapat").value = time(data.waktu);
            $('#ruangan_id').val(data.ruangan_id);
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
@endsection
