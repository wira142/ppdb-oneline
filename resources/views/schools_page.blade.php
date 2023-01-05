@extends('layouts.app')

@section('content')
  <div class="container">
    @include('layouts.partials.search_box_schools')

    <div class="row filter-stage mb-4">
      <div class="col-md-8 d-flex gap-2 align-items-center flex-row flex-wrap">
        <h5 class="me-3 my-0">filter</h5>
        <form action="" class="d-flex gap-3">
          <div class="input-group">
            <select class="form-select" id="inputGroupSelect02">
              <option selected>stage...</option>
              <option value="1">SD</option>
              <option value="2">SMP</option>
              <option value="3">SMA/SMK</option>
            </select>
          </div>
          <div class="input-group">
            <select class="form-select" id="inputGroupSelect02">
              <option selected>location...</option>
              <option value="1">Bandung</option>
              <option value="2">Jakarta</option>
              <option value="3">Sumedang</option>
            </select>
          </div>
          <button class="btn btn-info">apply</button>
        </form>
      </div>
    </div>
    <hr>

    @include('layouts.partials.card_schools')
  </div>
@endsection
