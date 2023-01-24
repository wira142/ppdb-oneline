@extends('layouts.app')

@section('content')
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-10 show-schools-image mb-4">
        <img src="{{ asset('storage/school_images/' . $school->school_image) }}" alt="school-image"
          class="img-fluid rounded">
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
      <div class="col-md-10 school-location mb-4">
        <div class="d-flex gap-2 align-items-center">
          <i class="fa-solid fa-location-dot fa-xl"></i>
          <p class="fw-bold mb-0">{{ $school->address }} <span class="full-address"></span></p>
        </div>
      </div>
      <div class="col-md-10">
        @if (@$froms)
          <h4>Available Registration</h4>
        @endif
        <div class="row mb-4">
          @foreach ($forms as $form)
            <div class="col-md-4 shadow rounded form-card py-2">
              <img src="{{ $form->poster }}" class="img-fluid rounded mx-auto" alt="poster">
              <div class="form-desc mt-2">
                <h5>{{ $form->title }}</h5>
                <p class="fw-bold mb-0"><i class="fa-solid fa-school"></i> {{ $form->degree }}</p>
                <p class="fw-bold mb-0 text-warning">Due {{ date('d F Y', strtotime($form->time_expired)) }}</p>
                <p class="text-secondary">
                  {{ substr_replace($form->description, ' ...', 110) }}
                </p>
              </div>
              <div class="form-footer">
                <a href="/schools/show/registration/{{ $form->form_id }}" class="btn btn-primary btn-sm">show more</a>
              </div>
            </div>
          @endforeach
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
          $(".full-address").append("Kel." + res.nama + " ")
      }).then((result) => {
        $.ajax({
          url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/{{ @$school->district }}',
          type: 'GET',
          dataType: 'json',
          success: res =>
            $(".full-address").append("Kec." + res.nama + " ")
        }).then(() => {
          $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/{{ @$school->city }}',
            type: 'GET',
            dataType: 'json',
            success: res =>
              $(".full-address").append(res.nama + " ")
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
