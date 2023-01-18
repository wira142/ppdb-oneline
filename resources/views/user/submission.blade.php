@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <h3>Submission List</h3>
        <hr>
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
        <div class="row my-4 gap-sm-4 gap-md-0 align-items-stretch">
          <div class="col-md-4">
            <div class="box-new-submission shadow rounded p-3 h-100">
              <h4>School Name</h4>
              <h6>Title Form Registration</h6>
              <p class="text-secondary">submit : 12 Desember 2021</p>
              <div class="d-flex justify-content-between align-items-center">
                <p class="text-warning mb-0">Pending</p>
                <a href="/user/submission/pending" class="btn btn-info">Action</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box-new-submission shadow rounded p-3 h-100">
              <h4>School Name</h4>
              <h6>Title Form Registration</h6>
              <p class="text-secondary">submit : 12 Desember 2021</p>
              <div class="d-flex justify-content-between align-items-center">
                <p class="text-success mb-0">Success</p>
                <a href="/user/submission/success" class="btn btn-info">Action</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box-new-submission shadow rounded p-3 h-100">
              <h4>School Name</h4>
              <h6>Title Form Registration</h6>
              <p class="text-secondary">submit : 12 Desember 2021</p>
              <div class="d-flex justify-content-between align-items-center">
                <p class="text-danger mb-0">Rejected</p>
                <a href="/user/submission/reject" class="btn btn-info">Action</a>
              </div>
            </div>
          </div>
        </div>
        <div class="history mt-5">
          <h5>History</h5>
          <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">School</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>School Name</td>
                <td>Title Registration</td>
                <td>12 Desemebr 2021</td>
                <td>
                  <p class="m-0 text-danger">Reject</p>
                </td>
                <td><a href="#" class="btn btn-outline-primary">Action</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
