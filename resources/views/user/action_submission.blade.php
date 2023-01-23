@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 p-4 bg-light shadow rounded">
        @if (session('failed'))
          <div class="alert alert-danger">
            {{ session('failed') }}
          </div>
        @endif
        <div class="row jusitfy-content-center">
          <div class="col-md-4">
            <div class="school-logo mx-auto mb-4 mb-md-0 rounded">
              <img src="{{ $submission->form->poster }}" alt="poster-image" class="img-fluid">
            </div>
          </div>
          <div class="col-md-8">
            <h3>{{ $submission->school_name }}</h3>
            <h5>{{ $submission->title_form }}</h5>
            <p>{{ $submission->form->description }}</p>

            @if ($submission->status == 'qualify' || $submission->status == 'accepted')
              <div class="success-alert">
                <div class="border border-success my-3 mb-4 p-4 text-center">
                  <h4 class="mb-0 fw-bold text-success">{{ $submission->status }}</h4>
                </div>
                @if ($submission->status == 'qualify')
                  <h5 class="text-center">You are qualified in this school, will you accept it?</h5>
                  <div class="option my-3 text-center">
                    <a href="{{ route('acc-submission', ['registration' => $submission->registration_id]) }}"
                      class="btn btn-primary">Accept</a>
                    <a href="{{ route('reject-submission', ['registration' => $submission->registration_id]) }}"
                      class="btn btn-outline-warning">Reject</a>
                  </div>
                  <h5 class="text-center countdown">...</h5>
                @endif
                @if ($submission->status == 'accepted')
                  <p class="text-center">Congratulations, you have been accepted at this school!</p>
                @endif
              </div>
            @endif

            @if ($submission->status == 'rejected')
              <div class="reject-alert">
                <div class="border border-danger my-3 p-4 text-center">
                  <h4 class="mb-0 fw-bold text-danger">REJECTED</h4>
                </div>
                <p class="text-center"><q>Jangan khawatir tentang kegagalan, khawatirkan tentang peluang yang kamu
                    lewatkan
                    bahkan ketika kamu tidak mencoba</q></p>
              </div>
            @endif

            @if ($submission->status == 'register')
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

@section('script')
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>
    function makeTimer() {

      //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");	
      var endTime = new Date("{{ $submission->updated_at }}");
      endTime = (Date.parse(endTime) / 1000) + 259200;

      var now = new Date();
      now = (Date.parse(now) / 1000);

      var timeLeft = endTime - now;

      var days = Math.floor(timeLeft / (60 * 60) / 24);
      var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
      var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
      var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
      if (days + hours + minutes + seconds < 1) {
        clearInterval(countDown);
      }
      if (hours < "10") {
        hours = "0" + hours;
      }
      if (minutes < "10") {
        minutes = "0" + minutes;
      }
      if (seconds < "10") {
        seconds = "0" + seconds;
      }
      $('.countdown').html(days + "d " + hours + "h " + minutes + "m " + seconds + "s");
    }

    let countDown = setInterval(function() {
      makeTimer();
    }, 1000);
  </script>
@endsection
