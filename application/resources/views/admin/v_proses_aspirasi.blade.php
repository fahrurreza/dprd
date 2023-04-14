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
            <form enctype="multipart/form-data" action="{{url('admin-create-hasil-aspirasi')}}" method="post">
              @csrf
              <input type="hidden" name="aspirasi_id" value="{{$data['aspirasi']->id}}">
              <div class="form-group">
                <label>Perihal</label>
                <input type="text" class="form-control" value="{{$data['aspirasi']->perihal}}" disabled>
              </div>
              <div class="form-group">
                <label>Aspirasi</label>
                <textarea class="form-control" cols="20" rows="10" disabled>{{$data['aspirasi']->pesan}}</textarea>
              </div>
              <div class="form-group">
                <label for="route">User</label>
                <input type="text" class="form-control" value="{{$data['aspirasi']->user->name}}" disabled>
              </div>
              <div class="form-group">
                <label for="route">Hasil</label>
                <input type="file" name="hasil" class="form-control" accept=".doc, .docx, .pdf">
              </div>
              <a href="{{url('admin-aspirasi')}}" class="btn btn-success mr-2">Kembali</a>
              <button class="btn btn-primary mr-2">Simpan</button>
            </form>
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
