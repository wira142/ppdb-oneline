@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 p-0">
        @if (session('permission'))
          <div class="alert alert-danger my-3" role="alert">
            <h3>{{ session('permission') }}</h3>
          </div>
        @endif
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active rounded" data-bs-interval="5000">
              <img src="{{ asset('storage/carousel/carousel-6.jpg') }}" class="d-block w-100" alt="carousel-1">
              <div class="carousel-caption d-none d-md-block">
                <h2>Play Together</h2>
                <p>Hanging out with new friends in a comfortable school</p>
              </div>
            </div>
            <div class="carousel-item rounded" data-bs-interval="5000">
              <img src="{{ asset('storage/carousel/carousel-4.jpg') }}" class="d-block w-100" alt="carousel-2">
              <div class="carousel-caption d-none d-md-block">
                <h2>Increase Knowledge</h2>
                <p>Keep going to a higher level, broaden your horizons</p>
              </div>
            </div>
            <div class="carousel-item rounded" data-bs-interval="5000">
              <img src="{{ asset('storage/carousel/carousel-5.jpg') }}" class="d-block w-100" alt="carousel-3">
              <div class="carousel-caption d-none d-md-block">
                <h2>Studying Together</h2>
                <p>Learn and develop together with friends at school</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-md-12">
        @include('layouts.partials.search_box_schools')
      </div>
      <div class="col-md-12">
        <h3 fw-bold>Daftar Sekolah</h3>
        <hr>
          @include('layouts.partials.card_schools')
      </div>
    </div>
  </div>
@endsection