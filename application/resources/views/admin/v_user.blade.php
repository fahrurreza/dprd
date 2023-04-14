@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="alert">
  </div>
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new user <i class="icon-circle-plus"></i></button>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>  
                </thead>
                <tbody>
                  @foreach($data['users'] as $user)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td class="font-weight-bold">{{$user->email}}</td>
                    <td><div class="btn badge badge-primary">{{$user->role}}</div></td>
                    <td>
                        <a class="btn badge badge-danger" href="{{url('admin-register-delete/'.$user->id)}}">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @include('modal/formUser')
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Hak Akses</h4>
            <div class="list-wrapper pt-2">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                @foreach($data['role'] as $role)
                <li>
                  <div class="form-check form-check-flat">
                      {{$role->role}}
                  </div>
                  <i class="remove ti-close" onclick="deleteRole({{$role->id}})"></i>
                </li>
                <form id="deleteRole" action="deleteRole" method="post">
                  @csrf
                  <input type="hidden" name="role_id" id="role_id">
                </form>
                @endforeach
              </ul>
            </div>
            
            <form class="d-inline" action="createRole" method="post">
              @csrf
              <div class="d-flex mb-0 mt-2">
                  <input type="text" class="form-control todo-list-input"  placeholder="Add new role" name="role">
                  <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent" type="submit"><i class="icon-circle-plus"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

  <script>
    function deleteRole(id){
      $('#role_id').val(id);
      $("#deleteRole").submit();
    }
  </script>
@endsection
