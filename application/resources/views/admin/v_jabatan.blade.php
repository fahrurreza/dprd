@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreateJabatan()" id="button-create-jabatan">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-jabatan" action="createJabatan" method="post">
          @csrf
          <input type="hidden" name="id" id="jabatan_id">
          <div class="form-group">
            <label for="menu">Jabatan</label>
            <input class="form-control" type="text" name="jabatan" id="jabatan">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateJabatan()">Cancel</button>
        </form>
      </div>
      <form id="deleteJabatan" action="deleteJabatan" method="post">
        @csrf
        <input type="hidden" name="jabatan_id" id="delete_jabatan_id">
      </form>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Jabatan</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    @foreach($data['jabatan'] as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->jabatan}}</td>
                        <td>
                        <div class="badge badge-success" onclick="editJabatan({{$list->id}}, '{{$list->jabatan}}')">Edit</div>
                        <div class="badge badge-danger" onclick="deleteJabatan({{$list->id}})">Delete</div>
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

    function showFormCreateJabatan(){
      $("#button-create-jabatan").addClass("d-none");
      $("#form-create-jabatan").removeClass("d-none");
    }


    function editJabatan(id, jabatan){
      document.getElementById("form-create-jabatan").action = "updateJabatan";
      $('#jabatan_id').val(id);
      $('#jabatan').val(jabatan);
      $("#button-create-jabatan").addClass("d-none");
      $("#form-create-jabatan").removeClass("d-none");
    }

    function deleteJabatan(id){
      $('#delete_jabatan_id').val(id);
      document.getElementById("deleteJabatan").submit();
      
    }


    function cancelFormCreateJabatan(){
      $("#button-create-jabatan").removeClass("d-none");
      $("#form-create-jabatan").addClass("d-none");
    }
  </script>
@endsection
