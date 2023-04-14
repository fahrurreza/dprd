@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreatePendidikan()" id="button-create-pendidikan">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-pendidikan" action="createPendidikan" method="post">
          @csrf
          <input type="hidden" name="id" id="pendidikan_id">
          <div class="form-group">
            <label for="menu">Pendidikan</label>
            <input class="form-control" type="text" name="pendidikan" id="pendidikan">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateJabatan()">Cancel</button>
        </form>
      </div>
      <form id="deletePendidikan" action="deletePendidikan" method="post">
        @csrf
        <input type="hidden" name="pendidikan_id" id="delete_pendidikan_id">
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
                    <th>Komisi</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    @foreach($data['pendidikan'] as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->pendidikan}}</td>
                        <td>
                        <div class="badge badge-success" onclick="editPendidikan({{$list->id}}, '{{$list->pendidikan}}')">Edit</div>
                        <div class="badge badge-danger" onclick="deletePendidikan({{$list->id}})">Delete</div>
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

    function showFormCreatePendidikan(){
      $("#button-create-pendidikan").addClass("d-none");
      $("#form-create-pendidikan").removeClass("d-none");
    }


    function editPendidikan(id, pendidikan){
      document.getElementById("form-create-pendidikan").action = "updatePendidikan";
      $('#pendidikan_id').val(id);
      $('#pendidikan').val(pendidikan);
      $("#button-create-pendidikan").addClass("d-none");
      $("#form-create-pendidikan").removeClass("d-none");
    }

    function deletePendidikan(id){
      $('#delete_pendidikan_id').val(id);
      document.getElementById("deletePendidikan").submit();
      
    }


    function cancelFormCreatePendidikan(){
      $("#button-create-pendidikan").removeClass("d-none");
      $("#form-create-pendidikan").addClass("d-none");
    }
  </script>
@endsection
