@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 shadow rounded p-4">
        <h3>My School</h3>
        <hr>
        <form method="post" action="{{ route('update-school') }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="row align-items-center">
            <div class="col-md-4">
              <div class="mx-auto mx-md-0" style="">
                <img src="{{ asset('storage/school_images/' . $school->school_image) }}" id="imgPreview" class="img-fluid rounded" alt="school image">
              </div>
            </div>
            <div class="col">
              <div class="mb-3">
                <label for="school_image" class="form-label">Choose New Image</label>
                <input type="file" name="school_image" value="{{ old('school_image', $school->school_image) }}"
                  class="form-control @error('school_image') is-invalid @enderror" id="school_image">
                <span class="text-secondary">*recomendation shape is rectangular</span>
                @error('school_image')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-md-8">
              <div class="mb-3">
                <label for="school_name" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ old('school_name', $school->name) }}" name="name"
                  id="school_name">
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" value="{{ old('address', $school->address) }}" class="form-control"
                  id="address">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="province" class="form-label">Province</label>
                    <select name="province" id="province" class="form-select">
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <select name="city" id="city" class="form-select">
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="district" class="form-label">District</label>
                    <select name="district" id="district" class="form-select">
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="village" class="form-label">Village</label>
                    <select name="village" id="village" class="form-select">
                    </select>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="6">{{ old('description', $school->description) }}</textarea>
              </div>
            </div>
            <div class="col-md-8 mt-3">
              <button class="btn btn-primary" type="submit">Save Profile</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>
    const offAll = () => {
      $("#city").prop("disabled", true);
      $("#district").prop("disabled", true);
      $("#village").prop("disabled", true);
    }
    const clearAll = () => {
      $("#city").find('option')
        .remove()
        .end()
        .prop("disabled", true);
      $("#district").find('option')
        .remove()
        .end()
        .prop("disabled", true);
      $("#village").find('option')
        .remove()
        .end()
        .prop("disabled", true);
    }

    $(document).ready(function() {
      // offAll();
      $.ajax({
        url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
        type: 'GET',
        dataType: 'json',
        success: res =>
          $.map(res.provinsi, function(val, index) {
            $('#province').append(
              '<option value="' + val.id + '" ' +
              (val.id == {{ $school->province }} ? 'selected' : '') +
              '>' + val.nama + '</option>'
            );
          })
      })

      $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi={{ $school->province }}`,
        type: 'GET',
        dataType: 'json',
        success: res =>
          $.map(res.kota_kabupaten, function(val, index) {
            $('#city').append(
              '<option value="' + val.id + '" ' +
              (val.id == {{ $school->city }} ? 'selected' : '') +
              '>' + val.nama + '</option>'
            );
          })
      })

      $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota={{ $school->city }}`,
        type: 'GET',
        dataType: 'json',
        success: res =>
          // console.log(res)
          $.map(res.kecamatan, function(val, index) {
            $('#district').append(
              '<option value="' + val.id + '" ' +
              (val.id == {{ $school->district }} ? 'selected' : '') +
              '>' + val.nama + '</option>'
            );
          })
      })

      $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan={{ $school->district }}`,
        type: 'GET',
        dataType: 'json',
        success: res =>
          $.map(res.kelurahan, function(val, index) {
            $('#village').append(
              '<option value="' + val.id + '" ' +
              (val.id == {{ $school->village }} ? 'selected' : '') +
              '>' + val.nama + '</option>'
            );
          })
      })

      $("#province").change(function() {
        clearAll();
        $("#city").find('option')
          .remove()
          .end()
          .prop("disabled", false);

        $.ajax({
          url: `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${$(this).val()}`,
          type: 'GET',
          dataType: 'json',
          success: res =>
            $.map(res.kota_kabupaten, function(val, index) {
              $('#city').append(
                `<option value="${val.id}">${val.nama}</option>`
              );
            })
        })

      });

      $("#city").change(function() {
        $("#district").find('option')
          .remove()
          .end()
          .prop("disabled", false);
        $("#village").find('option')
          .remove()
          .end()
          .prop("disabled", true);

        $.ajax({
          url: `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${$(this).val()}`,
          type: 'GET',
          dataType: 'json',
          success: res =>
            // console.log(res)
            $.map(res.kecamatan, function(val, index) {
              $('#district').append(
                `<option value="${val.id}">${val.nama}</option>`
              );
            })
        })

      });

      $("#district").change(function() {
        $("#village").find('option')
          .remove()
          .end()
          .prop("disabled", false);

        $.ajax({
          url: `https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=${$(this).val()}`,
          type: 'GET',
          dataType: 'json',
          success: res =>
            $.map(res.kelurahan, function(val, index) {
              $('#village').append(
                `<option value="${val.id}">${val.nama}</option>`
              );
            })
        })

      });

    });
  </script>

  <script>
    $(document).ready(() => {
      $('#school_image').change(function() {
        const file = this.files[0];
        console.log(file);
        if (file) {
          let reader = new FileReader();
          reader.onload = function(event) {
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
@endsection
