@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-6 my-3">
        <button class="btn btn-primary" onclick="showFormCreateOrganisasi()" id="button-create-organisasi">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-organisasi" action="createTugasFungsi" method="post">
          @csrf
          <input type="hidden" name="id" id="organisasi_id">
          <div class="form-group">
            <label for="menu">Devisi</label>
            <select class="form-control" name="organisasi_id" id="organisasi_id">
                @foreach($data['organisasi'] as $organisasi)
                <option value="{{$organisasi->id}}">{{$organisasi->unit}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="x">Fungsi</label>
              <input id="x" type="hidden" name="fungsi">
              <trix-editor input="x" id="fungsi"></trix-editor>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateOrganisasi()">Cancel</button>
        </form>
      </div>
      <form id="deleteTugasFungsi" action="deleteTugasFungsi" method="post">
        @csrf
        <input type="hidden" name="tugasfungsi_id" id="delete_tugasfungsi_id">
      </form>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Tugas Pokok</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Organisasi</th>
                    <th>Tugas Pokok</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                    @foreach($data['tugasfungsi'] as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->organisasi->unit}}</td>
                        <td>{!!$list->fungsi!!}</td>
                        <td>
                        <div class="badge badge-danger" onclick="deleteOrganisasi({{$list->id}})">Delete</div>
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

    function showFormCreateOrganisasi(){
      $("#button-create-organisasi").addClass("d-none");
      $("#form-create-organisasi").removeClass("d-none");
    }


    function editOrganisasi(id, organisasi){
      document.getElementById("form-create-organisasi").action = "updateOrganisasi";
      $('#organisasi_id').val(id);
      $('#organisasi').val(organisasi);
      $("#button-create-organisasi").addClass("d-none");
      $("#form-create-organisasi").removeClass("d-none");
    }

    function deleteOrganisasi(id){
      $('#delete_tugasfungsi_id').val(id);
      document.getElementById("deleteTugasFungsi").submit();
      
    }


    function cancelFormCreateOrganisasi(){
      $("#button-create-organisasi").removeClass("d-none");
      $("#form-create-organisasi").addClass("d-none");
    }
  </script>
@endsection
