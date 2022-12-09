@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center gap-4">
      <div class="col mb-4 profile-section">
        <h2 class="fw-bold">Profile</h2>
        <hr>
        <div class="d-flex gap-4 align-items-center">
          <div class="image-profile" style="">
            <img src="{{ asset('storage/profile_image/profile.jpg') }}" alt="">
          </div>
          <div class="user-data">
            <h3>{{ auth()->user()->name }}</h3>
            <h6>{{ auth()->user()->level }}</h6>
            <p class="mb-2"><i class="fa-solid fa-location-dot"></i> Bandung, Indonesia</p>
            <a href="#" class="link-info"><i class="fa-solid fa-pen-to-square"></i> Edit account</a>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
              type="button" role="tab" aria-controls="nav-home" aria-selected="true">Personal Data</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
              type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Father Data</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
              type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Mother Data</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active py-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0">
            <table cellpadding="3" cellspacing="3">
              <tr>
                <td>NISN</td>
                <td>:</td>
                <th>000278312</th>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td>3204280104020007</td>
              </tr>
              <tr>
                <td>Birth Place, Day</td>
                <td>:</td>
                <td>Bandung, 1 April 2002</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>:</td>
                <td>Male</td>
              </tr>
              <tr>
                <td>Religion</td>
                <td>:</td>
                <td>Kristen</td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>:</td>
                <td>089652222516</td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td>Jln.Cipasir Clustur Panorama Al-Hamim no.13 Rt.21 Rw.02 Des.Jelegong Kec.Rancaekek Kab.Bandung Jawa
                  Barat</td>
              </tr>
            </table>
          </div>
          <div class="tab-pane fade py-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
            tabindex="0">
            <table cellpadding="3" cellspacing="3">
              <tr>
                <td>Name</td>
                <td>:</td>
                <th>Ket Fung</th>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td>3204280104020007</td>
              </tr>
              <tr>
                <td>Study</td>
                <td>:</td>
                <td>S1</td>
              </tr>
              <tr>
                <td>Job</td>
                <td>:</td>
                <td>Pegawai Swasta</td>
              </tr>
              <tr>
                <td>Salary</td>
                <td>:</td>
                <td>Rp.1.000.000 - Rp.5.000.000</td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>:</td>
                <td>089652222516</td>
              </tr>
            </table>
          </div>
          <div class="tab-pane fade py-3" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
            tabindex="0">
            <table cellpadding="3" cellspacing="3">
              <tr>
                <td>Name</td>
                <td>:</td>
                <th>Neneng Wati</th>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td>3204280104020007</td>
              </tr>
              <tr>
                <td>Study</td>
                <td>:</td>
                <td>S1</td>
              </tr>
              <tr>
                <td>Job</td>
                <td>:</td>
                <td>Ibu Rumah Tangga</td>
              </tr>
              <tr>
                <td>Salary</td>
                <td>:</td>
                <td>Rp.1.000.000 - Rp.5.000.000</td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>:</td>
                <td>089652222516</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="text-center"><a href="" class="btn btn-primary">Change Data</a></div>
      </div>
    </div>
  </div>
@endsection
