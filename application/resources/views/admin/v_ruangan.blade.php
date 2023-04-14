@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreateRuangan()" id="button-create-Ruangan">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-ruangan" action="createRuangan" method="post">
          @csrf
          <input type="hidden" name="id" id="ruangan_id">
          <div class="form-group">
            <label for="ruangan">Nama Ruangan</label>
            <input class="form-control" type="text" name="ruangan" id="ruangan">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateRuangan()">Cancel</button>
        </form>
      </div>
      <form id="deleteRuangan" action="deleteRuangan" method="post">
        @csrf
        <input type="hidden" name="ruangan_id" id="delete_ruangan_id">
      </form>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Ruangan</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    @foreach($data['ruangan'] as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->nama}}</td>
                        <td>
                        <div class="badge badge-success" onclick="editRuangan({{$list->id}}, '{{$list->nama}}')">Edit</div>
                        <div class="badge badge-danger" onclick="deleteRuangan({{$list->id}})">Delete</div>
                        </td>
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

    function showFormCreateRuangan(){
      $("#button-create-Ruangan").addClass("d-none");
      $("#form-create-ruangan").removeClass("d-none");
    }


    function editRuangan(id, ruangan){
      document.getElementById("form-create-ruangan").action = "updateRuangan";
      $('#ruangan_id').val(id);
      $('#ruangan').val(ruangan);
      $("#button-create-Ruangan").addClass("d-none");
      $("#form-create-ruangan").removeClass("d-none");
    }

    function deleteRuangan(id){
      $('#delete_ruangan_id').val(id);
      document.getElementById("deleteRuangan").submit();
      
    }


    function cancelFormCreateRuangan(){
      $("#button-create-Ruangan").removeClass("d-none");
      $("#form-create-ruangan").addClass("d-none");
    }
  </script>
@endsection
