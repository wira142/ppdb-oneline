@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        @if (session('failed'))
          <div class="alert alert-danger">
            {{ session('failed') }}
          </div>
        @endif
        <div class="d-flex justify-content-between">
          <h3>My Forms</h3>
          <a href="/user/forms/new-poster" class="btn btn-success">Add new poster</a>
        </div>
        <hr>
      </div>
      @foreach ($forms as $form)
        <div class="col-md-4 shadow rounded form-card py-3">
          <div class="d-flex justify-content-center">
            <img src="{{ $form->poster }}" class="img-fluid rounded" alt="poster">
          </div>
          <div class="form-desc mt-2">
            <h5>{{ $form->title }}</h5>
            <p class="fw-bold mb-0"><i class="fa-solid fa-school"></i> {{ $form->degree }}</p>
            <p class="fw-bold mb-0 text-warning">Due {{ date('d F Y', strtotime($form->time_expired)) }}</p>
            <p class="text-secondary">
              {{ substr_replace($form->description, ' ...', 110) }}
            </p>
          </div>
          <div class="form-footer">
            <a href="/user/forms/show/{{ $form->form_id }}" class="btn btn-primary">Show More</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
