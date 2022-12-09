@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 p-4 shadow bg-light rounded">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="pas-photo-lg">
              <img src="{{ asset('storage/profile_image/example-profile.jpg') }}" alt="pas-photo" class="img-fluid">
            </div>
          </div>
          <div class="col-md-8">
            <h4>Personal Data</h4>
            <hr>
            <table cellPadding='5' class="mb-5">
              <tr>
                <th>NISN</th>
                <td>:</td>
                <td>20604477</td>
              </tr>
              <tr>
                <th>NIK</th>
                <td>:</td>
                <td>3204280104020007</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>:</td>
                <td>Agus Salim</td>
              </tr>
              <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>:</td>
                <td>Bandung, 1 Januari 2022</td>
              </tr>
              <tr>
                <th>Gender</th>
                <td>:</td>
                <td>Laki-Laki</td>
              </tr>
              <tr>
                <th>Religion</th>
                <td>:</td>
                <td>Islam</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>:</td>
                <td>089652444532</td>
              </tr>
              <tr>
                <th>Address</th>
                <td>:</td>
                <td>Jln. Cipasir Clustur Panorama Al-hamim no.1 Rt.02 Rw.21 Des.Jelegong, Kec.Rancaekek, Kab.Bandung, Jawa
                  Barat</td>
              </tr>
            </table>
            <h4>Father Data</h4>
            <hr>
            <table cellPadding='5' class="mb-5">
              <tr>
                <th>Status</th>
                <td>:</td>
                <td>Meninggal</td>
              </tr>
              <tr>
                <th>NIK</th>
                <td>:</td>
                <td>3204280104020007</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>:</td>
                <td>Tatang Salim</td>
              </tr>
              <tr>
                <th>Study</th>
                <td>:</td>
                <td>S1</td>
              </tr>
              <tr>
                <th>Job</th>
                <td>:</td>
                <td>Pegawai Swasta</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>:</td>
                <td>089652444532</td>
              </tr>
            </table>
            <h4>Mother Data</h4>
            <hr>
            <table cellPadding='5' class="mb-5">
              <tr>
                <th>Status</th>
                <td>:</td>
                <td>Meninggal</td>
              </tr>
              <tr>
                <th>NIK</th>
                <td>:</td>
                <td>3204280104020007</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>:</td>
                <td>Nani Salim</td>
              </tr>
              <tr>
                <th>Study</th>
                <td>:</td>
                <td>S1</td>
              </tr>
              <tr>
                <th>Job</th>
                <td>:</td>
                <td>Pegawai Swasta</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>:</td>
                <td>089652444532</td>
              </tr>
            </table>
            <a href="#" class="btn btn-success">Accept</a>
            <a href="#" class="btn btn-outline-danger">Reject</a>
            <a href="/user/registrators/back" class="btn btn-outline-secondary">Cencel</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
