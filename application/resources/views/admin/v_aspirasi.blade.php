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
            <p class="card-title mb-0">Aspirasi Masuk</p>
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Tanggal & Waktu</th>
                    <th>Status</th>
                    <th><center>Action</center></th>
                  </tr>  
                </thead>
                <tbody>
                  @foreach($data['aspirasi'] as $list)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$list->name}}</td>
                      <td>{{$list->created_at}}</td>
                      <td>{{$list->disposisi}}</td>
                      <td>
                        <center>
                          <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton{{$loop->iteration}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih...
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton{{$loop->iteration}}">
                            <a class="dropdown-item" href="{{url('admin-aspirasi/'.$list->id)}}">Lihat</a>
                            @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
                            @if($list->hasil == null && $list->disposisi != 'diterima')
                            <a class="dropdown-item" href="{{url('admin-aspirasi-accept/'.$list->id)}}">Acept</a>
                            @elseif($list->hasil == null)
                            <a class="dropdown-item" href="{{url('admin-proses-aspirasi/'.$list->id)}}">Proses</a>
                            @endif
                            @endif
                          </div>
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
      //
    }

    function deleteRapat(id){
      $('#delete_rapat_id').val(id);
      document.getElementById("deleteRapat").submit();
    }


    function cancelFormCreateRapat(){
      $("#button-create-anggota").removeClass("d-none");
      $("#form-create-rapat").addClass("d-none");
    }
  </script>
@endsection
