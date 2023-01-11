@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center bg-light rounded shadow p-5">
      <div class="col-12 mb-3">
        <h2 class="fw-bold">Re-check your data</h2>
      </div>
      <div class="col-md-3">
        <img src="{{ asset('storage/profile_images/' . auth()->user()->image) }}" alt="personal_image" class="img-fluid">
      </div>
      <div class="col-md-9 ps-md-3">
        <div class="mb-3">
          <h3>Personal Data</h3>
          <hr>
          @if ($personal == null)
            <h4>Data is not set!</h4>
          @else
            <table cellpadding="3" cellspacing="3">
              <tr>
                <td>NISN</td>
                <td>:</td>
                <th>{{ $personal->nisn }}</th>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $personal->nik }}</td>
              </tr>
              <tr>
                <td>Birth Place, Day</td>
                <td>:</td>
                <td>{{ $personal->birthplace . ', ' . date('d M Y', strtotime($personal->birthday)) }}</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>:</td>
                <td>{{ $personal->gender }}</td>
              </tr>
              <tr>
                <td>Religion</td>
                <td>:</td>
                <td>{{ $personal->religion }}</td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>:</td>
                <td>{{ $personal->phone }}</td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td class="address">
                  {{ $personal->address }}
                </td>
              </tr>
            </table>
          @endif
        </div>
        <div class="mb-3">
          <h3>Father Data</h3>
          <hr>
          @if (@$father == null)
            <h4>Data is not set!</h4>
          @else
            <table cellpadding="3" cellspacing="3">
              <tr>
                <td>Name</td>
                <td>:</td>
                <th>{{ $father->name }}</th>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $father->nik }}</td>
              </tr>
              <tr>
                <td>Study</td>
                <td>:</td>
                <td>{{ $father->study }}</td>
              </tr>
              <tr>
                <td>Job</td>
                <td>:</td>
                <td>{{ $father->job }}</td>
              </tr>
              <tr>
                <td>Salary</td>
                <td>:</td>
                <td>{{ $father->salary }}</td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>:</td>
                <td>{{ $father->phone }}</td>
              </tr>
            </table>
          @endif
        </div>
        <div class="mb-3">
          <h3>Mother Data</h3>
          <hr>
          @if (@$mother == null)
            <h4>Data is not set!</h4>
          @else
            <table cellpadding="3" cellspacing="3">
              <tr>
                <td>Name</td>
                <td>:</td>
                <th>{{ $mother->name }}</th>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $mother->nik }}</td>
              </tr>
              <tr>
                <td>Study</td>
                <td>:</td>
                <td>{{ $mother->study }}</td>
              </tr>
              <tr>
                <td>Job</td>
                <td>:</td>
                <td>{{ $mother->job }}</td>
              </tr>
              <tr>
                <td>Salary</td>
                <td>:</td>
                <td>{{ $mother->salary }}</td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>:</td>
                <td>{{ $mother->phone }}</td>
              </tr>
            </table>
          @endif
        </div>
        <div class="text-center">
          <a href="/registration/update" class="btn btn-outline-primary">Change Data</a>
          <a href="/registration/update" class="btn btn-success">Registration Now</a>
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
        url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan/{{ $personal->village }}',
        type: 'GET',
        dataType: 'json',
        success: res =>
          $(".address").append("Kel." + res.nama + ", ")
      }).then((result) => {
        $.ajax({
          url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/{{ $personal->district }}',
          type: 'GET',
          dataType: 'json',
          success: res =>
            $(".address").append("Kec." + res.nama + ", ")
        }).then(() => {
          $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/{{ $personal->city }}',
            type: 'GET',
            dataType: 'json',
            success: res =>
              $(".address").append(res.nama + ", ")
          }).then(() => {
            $.ajax({
              url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/{{ $personal->province }}',
              type: 'GET',
              dataType: 'json',
              success: res =>
                $(".address").append("Prov." + res.nama)
            })
          })
        })
      })
    })
  </script>
@endsection
