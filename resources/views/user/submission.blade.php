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
          @foreach ($submission as $key => $sub)
            @if ($key == 3)
            @break
          @endif
          <div class="col-md-4">
            <div class="box-new-submission shadow rounded p-3 h-100">
              <h4>{{ $sub->school_name }}</h4>
              <h6>{{ $sub->title_form }}</h6>
              <p class="text-secondary">submit : {{ date('d F Y', strtotime($sub->created_at)) }}</p>
              <div class="d-flex justify-content-between align-items-center">
                @if ($sub->status == 'register')
                  <p class="text-warning mb-0">{{ $sub->status }}</p>
                @elseif ($sub->status == 'qualify' || $sub->status == 'accepted')
                  <p class="text-success mb-0">{{ $sub->status }}</p>
                @elseif ($sub->status == 'rejected')
                  <p class="text-danger mb-0">Rejected</p>
                @endif
                <a href="/user/submission/{{ $sub->registration_id }}" class="btn btn-info">Action</a>
              </div>
            </div>
          </div>
        @endforeach
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
            @if (@$students)
              @foreach ($submission as $key => $sub)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $sub->school_name }}</td>
                  <td>{{ $sub->title_form }}</td>
                  <td>{{ date('d F Y', strtotime($sub->created_at)) }}</td>
                  <td>
                    @if ($sub->status == 'register')
                      <p class="text-warning mb-0">{{ $sub->status }}</p>
                    @elseif ($sub->status == 'qualify' || $sub->status == 'accepted')
                      <p class="text-success mb-0">Success</p>
                    @elseif ($sub->status == 'rejected')
                      <p class="text-danger mb-0">Rejected</p>
                    @endif
                  </td>
                  <td><a href="/user/submission/{{ $sub->registration_id }}" class="btn btn-outline-info">Action</a>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="7" class="text-center text-danger">You don't have any registration!</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
