@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                  @foreach($data['roles'] as $role)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$role->role}}</td>
                    <td class="font-weight-medium">
                      <div class="btn badge badge-success" onclick="showAccess({{$role->id}})">Access</div>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @include('modal/formMenu')
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Access <span class="text-small">(Click Button <div class="badge badge-success">Access</div>)</span></h4>
            <div class="row mx-3" id="accessMenu">
              
            </div>
            <form id="formAccess" action="createAccess" method="post">
              @csrf
              <input type="hidden" name="menu_id" id="menu_id">
              <input type="hidden" name="role_id" id="role_id">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

  <script>
    function showAccess(id){
      $("#role_id").val(id);
      $.ajax({
          type : 'get',
          url : '{{URL::to('accessMenu')}}',
          data:{'id':id},
          success:function(data){
            $('#accessMenu').html(data);
          }
      });
    }

    function createAccess(id){
      $("#menu_id").val(id);
      $("#formAccess").submit();
    }
  </script>
@endsection
