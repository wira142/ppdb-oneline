@extends('layouts.app')

@section('content')
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-10 show-schools-image mb-4">
        <img src="{{ asset('storage/school_images/' . $school->school_image) }}" alt="" class="img-fluid">
      </div>
      <div class="col-md-10 title-school">
        <h3 class="fw-bold">{{ $school->name }}</h3>
        <p><i class="fa-solid fa-location-crosshairs"></i> <span class="address"></span></p>
        <hr>
      </div>
      <div class="col-md-10 description my-3">
        <h4>School Description</h4>
        <p>{{ $school->description }}</p>
      </div>
      <div class="col-md-10 school-location">
        <div class="row">
          <div class="col-md-6 d-flex gap-2 align-items-center">
            <i class="fa-solid fa-location-dot fa-xl"></i>
            <p class="fw-bold mb-0 full-address"></p>
          </div>
          <div class="col-md-6 text-end">
            <a href="/registration" class="btn btn-outline-warning btn-lg">Register Now!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/{{ @$school->city }}',
        type: 'GET',
        dataType: 'json',
        success: res =>
          $(".address").append(res.nama + " . ")
      }).then((city) => {
        $.ajax({
          url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/{{ @$school->province }}',
          type: 'GET',
          dataType: 'json',
          success: res =>
            $(".address").append(res.nama)
        })
      })


      $.ajax({
        url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan/{{ @$school->village }}',
        type: 'GET',
        dataType: 'json',
        success: res =>
          $(".full-address").append("Kel." + res.nama + ", ")
      }).then((result) => {
        $.ajax({
          url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/{{ @$school->district }}',
          type: 'GET',
          dataType: 'json',
          success: res =>
            $(".full-address").append("Kec." + res.nama + ", ")
        }).then(() => {
          $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/{{ @$school->city }}',
            type: 'GET',
            dataType: 'json',
            success: res =>
              $(".full-address").append(res.nama + ", ")
          }).then(() => {
            $.ajax({
              url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/{{ @$school->province }}',
              type: 'GET',
              dataType: 'json',
              success: res =>
                $(".full-address").append("Prov." + res.nama)
            })
          })
        })
      })

    })
  </script>
@endsection
