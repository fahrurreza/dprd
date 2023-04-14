@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    @include('template/admin/welcome')
        <div class="card mx-2">
        <img class="card-img-top" src="{{asset('adm/images/upload/'.$post->image->files)}}" alt="Gambar Ilustrasi">
        <span class="mx-3">Posted Date : {{$post->created_at}}</span>
        <span class="mx-3">Created By : {{$post->user->name}}</span>
            <div class="card-title mx-4 mt-5">
                <h3>{{$post->title}}</h3>
            </div>
            <div class="card-body text-justify">
                {!! $post->content !!}
            </div>
            <div class="button-back">
                <a href="../admin-warta" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
    </div>
  </div>
@endsection
