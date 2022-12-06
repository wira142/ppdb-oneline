@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 p-4 bg-light shadow rounded">
        <div class="row jusitfy-content-center">
          <div class="col-md-4">
            <div class="school-logo mx-auto mb-4 mb-md-0 rounded">
              <img src="{{ asset('storage/profile_image/profile.jpg') }}" alt="" class="">
            </div>
          </div>
          <div class="col-md-8">
            <h3>Title School</h3>
            <h5>Registration name</h5>
            <p>registration description Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid, saepe.</p>

            @if ($status == 'success')
              <div class="success-alert">
                <div class="border border-success my-3 mb-4 p-4 text-center">
                  <h4 class="mb-0 fw-bold text-success">QUALIFIED</h4>
                </div>
                <h5 class="text-center">You are qualified in this school, will you accept it?</h5>
                <div class="option my-3 text-center">
                  <a href="#" class="btn btn-primary">Accept</a>
                  <a href="#" class="btn btn-outline-warning">Reject</a>
                </div>
                <p class="text-center">You have 3 days to choose...</p>
              </div>
            @endif

            @if ($status == 'reject')
              <div class="reject-alert">
                <div class="border border-danger my-3 p-4 text-center">
                  <h4 class="mb-0 fw-bold text-danger">REJECTED</h4>
                </div>
                <p class="text-center"><q>Jangan khawatir tentang kegagalan, khawatirkan tentang peluang yang kamu
                    lewatkan
                    bahkan ketika kamu tidak mencoba</q></p>
              </div>
            @endif

            @if ($status == 'pending')
              <div class="pending-alert">
                <div class="border border-warning my-3 p-4 text-center">
                  <h4 class="mb-0 fw-bold text-warning">PENDING</h4>
                </div>
                <p class="text-center">Your submission is still in selection..</p>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
