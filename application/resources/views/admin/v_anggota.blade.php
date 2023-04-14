@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-12 my-3">
        <button class="btn btn-primary" onclick="showFormCreateAnggota()" id="button-create-anggota">Tambah Data<i class="icon-circle-plus"></i></button>
        <form class="forms-sample d-none" id="form-create-anggota" action="createAnggota" method="post">
          @csrf
          <input type="hidden" name="id" id="anggota_id">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="menu">NIP</label>
                <input class="form-control" type="number" name="nip" id="nip">
              </div>
              <div class="form-group">
                <label for="menu">Nama</label>
                <input class="form-control" type="text" name="nama" id="nama">
              </div>
              <div class="form-group">
                <label for="menu">Tempat Lahir</label>
                <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir">
              </div>
              <div class="form-group">
                <label for="menu">Tanggl Lahir</label>
                <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir">
              </div>
              <div class="form-group">
                <label for="menu">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="9"></textarea>
              </div>
              
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="menu">Pendidikan</label>
                <select class="form-control" name="pendidikan_id" id="pendidikan_id">
                    @foreach($data['pendidikan'] as $pendidikan)
                    <option value="{{$pendidikan->id}}">{{$pendidikan->pendidikan}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="menu">Jabatan</label>
                <select class="form-control" name="jabatan_id" id="jabatan_id">
                    @foreach($data['jabatan'] as $jabatan)
                    <option value="{{$jabatan->id}}">{{$jabatan->jabatan}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="menu">Partai</label>
                <select class="form-control" name="partai_id" id="partai_id">
                    @foreach($data['partai'] as $partai)
                    <option value="{{$partai->id}}">{{$partai->partai}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="menu">Komisi</label>
                <select class="form-control" name="komisi_id" id="komisi_id">
                    @foreach($data['komisi'] as $komisi)
                    <option value="{{$komisi->id}}">{{$komisi->komisi}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="menu">Periode Awal</label>
                <input class="form-control" type="date" name="awal" id="awal">
              </div>
              <div class="form-group">
                <label for="menu">Periode Akhir</label>
                <input class="form-control" type="date" name="akhir" id="akhir">
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
                    @foreach($data['anggota'] as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->nama}}</td>
                        <td>{{$list->jabatan->jabatan}}</td>
                        <td>
                            <div class="badge badge-primary" onclick="detailAnggota({{$list->id}})">Detail</div>
                            <div class="badge badge-success" onclick="editAnggota({{$list->id}})">Edit</div>
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

    function showFormCreateAnggota(){
      $("#button-create-anggota").addClass("d-none");
      $("#form-create-anggota").removeClass("d-none");
    }


    function editAnggota(id, komisi){
      document.getElementById("form-create-anggota").action = "updateKomisi";
      $('#komisi_id').val(id);
      $('#komisi').val(komisi);
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
