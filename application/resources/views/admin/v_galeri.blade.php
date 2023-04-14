@extends('template/admin/master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @include('template/admin/welcome')
            <div class="row">
                @foreach($data['post'] as $post)
                <div class="col-md-4 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('adm/images/upload/'.$post->image->files)}}" alt="Gambar Ilustrasi">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text"><div>{{$post->created_at}}</div></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
  <!-- content-wrapper ends -->

<script>
function showFormPublish()
{
    $("#buttonShowFormPublish").addClass("d-none");
    $("#formPublish").removeClass("d-none");
}

function cancelFormPublish()
{
    $("#buttonShowFormPublish").removeClass("d-none");
    $("#formPublish").addClass("d-none");
}
</script>
@endsection
