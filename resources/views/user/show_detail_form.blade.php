@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 shadow rounded py-2">
        <div class="row">
          <div class="col-md-4 mb-3">
            <img src="{{ $form->poster }}" class="img-fluid rounded mx-auto" alt="poster">
          </div>
          <div class="col-md-8">
            <h3 class="fw-bold">{{ $form->title }}</h3>
            <p class="fw-bold"><i class="fa-solid fa-school"></i> {{ $form->degree }} . <span
                class="fw-bold mb-0 text-warning">Due {{ date('d F Y', strtotime($form->time_expired)) }}</span></p>
            <p class="text-secondary">{{ $form->description }}</p>
            <a href="/registration/{{ $form->form_id }}" class="btn btn-primary btn-sm">Register Now!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
