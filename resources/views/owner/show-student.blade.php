@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 p-4 shadow bg-light rounded">
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
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="pas-photo-lg">
              <img src="{{ $user->image }}" alt="pas-photo" class="img-fluid rounded">
              @if ($user->status_form != 'register')
                <h5 class="my-3 border rounded p-2 border-warning">The register was <span
                    class="fw-bold @if ($user->status_form == 'rejected') {{ 'text-danger' }}@else{{ 'text-success' }} @endif">{{ $user->status_form }}</span>
                </h5>
              @endif
            </div>
          </div>
          <div class="col-md-8">
            <h4>Personal Data</h4>
            <hr>
            <table cellPadding='5' class="mb-5">
              <tr>
                <th>NISN</th>
                <td>:</td>
                <td>{{ $personal->nisn }}</td>
              </tr>
              <tr>
                <th>NIK</th>
                <td>:</td>
                <td>{{ $personal->nik }}</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>:</td>
                <td>{{ $user->name }}</td>
              </tr>
              <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>:</td>
                <td>{{ $personal->birthplace . ', ' . $personal->birthday }}</td>
              </tr>
              <tr>
                <th>Gender</th>
                <td>:</td>
                <td>{{ $personal->gender }}</td>
              </tr>
              <tr>
                <th>Religion</th>
                <td>:</td>
                <td>{{ $personal->religion }}</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>:</td>
                <td>{{ $personal->phone }}</td>
              </tr>
              <tr>
                <th>Address</th>
                <td>:</td>
                <td><span class="address"></span></td>
              </tr>
            </table>
            <h4>Father Data</h4>
            <hr>
            <table cellPadding='5' class="mb-5">
              <tr>
                <th>Status</th>
                <td>:</td>
                <td>{{ $father->status }}</td>
              </tr>
              <tr>
                <th>NIK</th>
                <td>:</td>
                <td>{{ $father->nik }}</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>:</td>
                <td>{{ $father->name }}</td>
              </tr>
              <tr>
                <th>Study</th>
                <td>:</td>
                <td>{{ $father->study }}</td>
              </tr>
              <tr>
                <th>Job</th>
                <td>:</td>
                <td>{{ $father->job }}</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>:</td>
                <td>{{ $father->phone }}</td>
              </tr>
            </table>
            <h4>Mother Data</h4>
            <hr>
            <table cellPadding='5' class="mb-5">
              <tr>
                <th>Status</th>
                <td>:</td>
                <td>{{ $mother->status }}</td>
              </tr>
              <tr>
                <th>NIK</th>
                <td>:</td>
                <td>{{ $mother->nik }}</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>:</td>
                <td>{{ $mother->name }}</td>
              </tr>
              <tr>
                <th>Study</th>
                <td>:</td>
                <td>{{ $mother->study }}</td>
              </tr>
              <tr>
                <th>Job</th>
                <td>:</td>
                <td>{{ $mother->job }}</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>:</td>
                <td>{{ $mother->phone }}</td>
              </tr>
            </table>
            @if ($user->status_form == 'register')
              <a href="{{ route('registrator-qualify', ['registration' => $user->form_id]) }}"
                class="btn btn-success">Qualify</a>
              <a href="{{ route('registrator-reject', ['registration' => $user->form_id]) }}"
                class="btn btn-outline-danger">Reject</a>
            @endif
            <a href="/user/registrators/back" class="btn btn-outline-secondary">Cencel</a>
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
      const village = {{ @$personal->village }} + ""
      if (village != "") {
        $.ajax({
          url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan/{{ @$personal->village }}',
          type: 'GET',
          dataType: 'json',
          success: res =>
            $(".address").append("Kel." + res.nama + ", ")
        }).then((result) => {
          $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/{{ @$personal->district }}',
            type: 'GET',
            dataType: 'json',
            success: res =>
              $(".address").append("Kec." + res.nama + ", ")
          }).then(() => {
            $.ajax({
              url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/{{ @$personal->city }}',
              type: 'GET',
              dataType: 'json',
              success: res =>
                $(".address").append(res.nama + ", ")
            }).then(() => {
              $.ajax({
                url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/{{ @$personal->province }}',
                type: 'GET',
                dataType: 'json',
                success: res =>
                  $(".address").append("Prov." + res.nama)
              })
            })
          })
        })
      }
    })
  </script>
@endsection
