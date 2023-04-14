@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreateKomisi()" id="button-create-komisi">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-komisi" action="createKomisi" method="post">
          @csrf
          <input type="hidden" name="id" id="komisi_id">
          <div class="form-group">
            <label for="menu">komisi</label>
            <input class="form-control" type="text" name="komisi" id="komisi">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateJabatan()">Cancel</button>
        </form>
      </div>
      <form id="deleteKomisi" action="deleteKomisi" method="post">
        @csrf
        <input type="hidden" name="komisi_id" id="delete_komisi_id">
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
                    @foreach($data['komisi'] as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->komisi}}</td>
                        <td>
                        <div class="badge badge-success" onclick="editKomisi({{$list->id}}, '{{$list->komisi}}')">Edit</div>
                        <div class="badge badge-danger" onclick="deleteKomisi({{$list->id}})">Delete</div>
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

    function showFormCreateKomisi(){
      $("#button-create-komisi").addClass("d-none");
      $("#form-create-komisi").removeClass("d-none");
    }


    function editKomisi(id, komisi){
      document.getElementById("form-create-komisi").action = "updateKomisi";
      $('#komisi_id').val(id);
      $('#komisi').val(komisi);
      $("#button-create-komisi").addClass("d-none");
      $("#form-create-komisi").removeClass("d-none");
    }

    function deleteKomisi(id){
      $('#delete_komisi_id').val(id);
      document.getElementById("deleteKomisi").submit();
      
    }


    function cancelFormCreatekomisi(){
      $("#button-create-komisi").removeClass("d-none");
      $("#form-create-komisi").addClass("d-none");
    }
  </script>
@endsection
