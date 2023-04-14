@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-12 my-3">
        <button class="btn btn-primary" onclick="showFormCreateStruktur()" id="button-create-anggota">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-anggota" action="createStruktur" method="post">
          @csrf
          <input type="hidden" name="id" id="struktur_id">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="menu">Anggota</label>
                <select class="form-control" name="anggota_id" id="anggota_id">
                    @foreach($data['anggota'] as $anggota)
                    <option value="{{$anggota->id}}">{{$anggota->nama}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="menu">Jabatan</label>
                <select class="form-control" name="jabatan" id="jabatan">
                    <option value="Ketua DPRD">Ketua DPRD</option>
                    <option value="Wakil I Ketua DPRD">Wakil I Ketua DPRD</option>
                    <option value="Wakil II Ketua DPRD">Wakil II Ketua DPRD</option>
                </select>
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateAnggota()">Cancel</button>
        </form>
      </div>
      <form id="deleteAnggota" action="deleteAnggota" method="post">
        @csrf
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
                    @foreach($data['struktur'] as $list)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$list->anggota->nama}}</td>
                      <td>{{$list->jabatan}}</td>
                      <td>
                        <div class="badge badge-success" onclick="editStruktur({{$list->id}}, '{{$list->anggota->nama}}', '{{$list->jabatan}}')">Edit</div>
                        <div class="badge badge-danger" onclick="deleteAnggota({{$list->id}})">Delete</div>
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

    function showFormCreateStruktur(){
      $("#button-create-anggota").addClass("d-none");
      $("#form-create-anggota").removeClass("d-none");
    }


    function editStruktur(id, anggota, jabatan){
      console.log(anggota);
      document.getElementById("form-create-anggota").action = "updateStruktur";
      $('#struktur_id').val(id);
      $('#anggota_id').val(anggota);
      $('#jabatan').val(jabatan);
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
@endsection
