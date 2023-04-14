@extends('layouts/master')

@section('content')
<div class="container-fluid">               
    <form method="post" action="/user">
        @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" placeholder="Nama" value="{{old('name')}}">
                    <div class="invalid-feedback">
                        Tidak Boleh Kosong
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNIK" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="mail" class="form-control @error('mail') is-invalid @enderror" id="inputNIK" name="mail" placeholder="120505050505" value="{{old('mail')}}">
                    <div class="invalid-feedback">
                        Tidak Boleh Kosong
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputAddress" name="password" placeholder="Password">
                    <div class="invalid-feedback">
                        Tidak Boleh Kosong
                    </div>
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