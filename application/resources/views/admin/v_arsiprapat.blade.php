@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Arsip Hasil Rapat</p>
            
              <div class="row mt-3">
                <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Rapat</th>
                        <th>File</th>
                        <th><center>Action</center></th>
                      </tr>  
                    </thead>
                    <tbody>
                      @foreach($data['rapat'] as $doc)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$doc->nama_rapat}}</td>
                          <td>
                            @if(extensi($doc->hasil) == 'pdf')
                              <a class="btn btn-light text-center mx-2">
                                <i class="mdi mdi-file-pdf text-danger" style="font-size: 70px"></i>
                                <p style="margin-top : -20px">{{$doc->hasil}}</p>
                              </a>
                            @else
                              <a class="btn btn-light text-center mx-2">
                                <i class="mdi mdi-file-word text-primary" style="font-size: 70px"></i>
                                <p style="margin-top : -20px">{{$doc->hasil}}</p>
                              </a>
                            @endif
                          </td>
                          <td>
                            <center><a class="btn btn-success" href="{{asset('adm/document/'.$doc->hasil)}}" download> <i class="mdi mdi-download"> </i> Download </a></center>
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
