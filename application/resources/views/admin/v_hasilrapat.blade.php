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
        <form class="forms-sample d-none" id="form-create-rapat" action="createHasilRapat" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="rapat_id" id="rapat_id">
          <div class="row">
            <div class="col-6">
              <!-- <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" type="text" name="keterangan_rapat" id="keterangan_rapat">
              </div> -->
              <div class="form-group">
                <label for="route">Hasil</label>
                <input type="file" name="hasil" class="form-control" accept=".doc, .docx, .pdf">
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light" type="button" onclick="cancelFormCreateRapat()">Cancel</button>
        </form>
      </div>
      <form id="deleteHasilRapat" action="deleteHasilRapat" method="post">
        @csrf
        <input type="hidden" name="rapat_id" id="delete_rapat_id">
      </form>
      @endif
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Data Hasil Rapat</p>
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal & Waktu</th>
                    <th><center>Action</center></th>
                  </tr>  
                </thead>
                <tbody>
                    @foreach($data['rapat'] as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->nama_rapat}}</td>
                        <td>{{$list->waktu}}</td>
                        <td>
                            <center>
                              @if($list->hasil == null and check_access(Auth::user()->role_id) ==  true)
                              <div class="badge badge-success" onclick="showFormCreate({{$list->id}})">Input Hasil</div>
                              @elseif($list->hasil == null and check_access(Auth::user()->role_id) ==  false)
                              <div class="badge badge-info">Belum ada hasil</div>
                              @elseif($list->hasil != null and check_access(Auth::user()->role_id) ==  true)
                              <div class="badge badge-danger" onclick="deleteRapat({{$list->id}})">Hapus Hasil</div>
                              @else
                              <a class="badge badge-warning" href="{{asset('adm/document/'.$list->hasil)}}" download>Download Hasil</a>
                              @endif
                            </center>
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

    function showFormCreate(id){
      $('#rapat_id').val(id);
      $("#button-create-anggota").addClass("d-none");
      $("#form-create-rapat").removeClass("d-none");

    }


    function editRapat(id){
      //
    }

    function deleteRapat(id){
      console.log(id);
      $('#delete_rapat_id').val(id);
      document.getElementById("deleteHasilRapat").submit();
    }


    function cancelFormCreateRapat(){
      $("#button-create-anggota").removeClass("d-none");
      $("#form-create-rapat").addClass("d-none");
    }

  </script>
@endsection
