@extends('template/admin/master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    @include('template/admin/welcome')
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="{{asset('adm/images/dashboard/people.svg')}}" alt="people">
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Today’s Aspirasi</p>
                <p class="fs-30 mb-2">{{$data['aspirasi_now']}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Total Aspirasi</p>
                <p class="fs-30 mb-2">{{$data['aspirasi_total']}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Posting Warta</p>
                <p class="fs-30 mb-2">{{$data['warta']}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Rapat</p>
                <p class="fs-30 mb-2">{{$data['rapat']}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection