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
            @if ($students)
              @foreach ($students as $key => $student)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>
                    <div class="pas-photo" style="max-width: 60px">
                      <img src="{{ $student->image }}" alt="profile-image" class="img-fluid rounded">
                    </div>
                  </td>
                  <td>{{ $student->personal->nisn }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->form_name }}</td>
                  <td>
                    @if ($student->status_form == 'register')
                      <p class="text-warning mb-0">{{ $student->status_form }}</p>
                    @elseif ($student->status_form == 'qualify' || $student->status_form == 'accepted')
                      <p class="text-success mb-0">{{ $student->status_form }}</p>
                    @elseif ($student->status_form == 'rejected')
                      <p class="text-danger mb-0">Rejected</p>
                    @endif
                  </td>
                  <td><a href="/user/registrators/{{ $student->id }}/{{ $student->registration_id }}"
                      class="btn btn-outline-primary">Action</a></td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="7">Registrators not found!</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
