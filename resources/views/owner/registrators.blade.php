@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 shadow rounded bg-light p-4">
        <h3>Registrators</h3>
        <hr>
        <div class="filter-table my-4 d-flex justify-content-end">
          <form action="">
            <select class="form-select" id="filter">
              <option selected>filter</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </form>
        </div>
        <table class="table align-middle table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Photo</th>
              <th scope="col">NISN</th>
              <th scope="col">Name</th>
              <th scope="col">Form Name</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>
                <div class="pas-photo">
                  <img src="{{ asset('storage/profile_image/example-profile.jpg') }}" alt="" class="img-fluid">
                </div>
              </td>
              <td>20604477</td>
              <td>Agus Sulaiman</td>
              <td>REGISTRATION SD 2022</td>
              <td>Waiting</td>
              <td><a href="/user/registrators/user_id" class="btn btn-outline-primary">Action</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
