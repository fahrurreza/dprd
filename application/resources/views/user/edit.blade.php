@extends('layouts/master')

@section('content')
<div class="container-fluid">               
    <form method="post" action="{{url('user/'.$user->id)}}">
        @csrf @method('patch')
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNIK" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="new_password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Comfirm New Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="confirm_password">
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <a class="btn btn-warning my-2" href="{{ url('/patient') }}"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Post</button>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
@endsection