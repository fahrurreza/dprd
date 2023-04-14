@extends('layouts/master')

@section('content')
<div class="container-fluid">     
    <div class="modal-body">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$user->username}}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNIK" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$user->email}}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">User Level</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$user->position}}" disabled>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection