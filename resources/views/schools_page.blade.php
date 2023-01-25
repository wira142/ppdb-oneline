@extends('layouts.app')

@section('content')
  <div class="container">
    @include('layouts.partials.search_box_schools')

    <div class="row filter-stage mb-4">
      <div class="col-md-8 d-flex gap-2 align-items-center flex-row flex-wrap">
        <h5 class="me-3 my-0">filter</h5>
        <form action="{{ route('find-school') }}" method="get" class="d-flex gap-3">
          @if (@$keyword)
            <input type="hidden" name="keyword" value="{{ $keyword }}">
          @endif
          <div class="input-group">
            <select class="form-select" name="stage" id="inputGroupSelect02">
              <option selected value="">Stage</option>
              <option value="SD" @if (@$stage == 'SD') {{ 'selected' }} @endif>SD</option>
              <option value="SMP" @if (@$stage == 'SMP') {{ 'selected' }} @endif>SMP</option>
              <option value='SMA/SMK' @if (@$stage == 'SMA/SMK') {{ 'selected' }} @endif>SMA/SMK</option>
            </select>
          </div>
          <div class="input-group">
            <select class="form-select" name="location" id="province">
            </select>
          </div>
          <button type="submit" class="btn btn-info">apply</button>
        </form>
      </div>
    </div>
    <hr>
    @include('layouts.partials.card_schools')
  </div>
@endsection

@section('script')
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#province').append(
        `<option value="">location</option>`
      );
      $.ajax({
        url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
        type: 'GET',
        dataType: 'json',
        success: res =>
          $.map(res.provinsi, function(val, index) {
            $('#province').append(
              `<option value="${val.id}" ${val.id == "{{ @$location }}" ? "selected" : ""}>${val.nama}</option>`
            );
          })
      })
    });
  </script>
@endsection
