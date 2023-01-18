@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3>My Forms</h3>
        <hr>
      </div>
      <div class="col-md-4 shadow rounded form-card py-2">
        <img src="{{ asset('storage/dummy/poster.jpg') }}" class="img-fluid rounded mx-auto" alt="poster">
        <div class="form-desc mt-2">
          <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ullam!</h5>
          <p class="fw-bold mb-0"><i class="fa-solid fa-school"></i> SMP</p>
          <p class="fw-bold mb-0 text-warning">Due 12 Desember 2022</p>
          <p class="text-secondary">
            {{ substr_replace('Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reprehenderit impedit reiciendis alias distinctio autem nihil aperiam explicabo magni optio id eum, sed ipsum debitis eaque laborum molestias tenetur earum temporibus a dolore praesentium eligendi, voluptate vitae. Unde doloribus at consectetur dignissimos quis a iusto provident quasi maxime temporibus mollitia, minima impedit culpa, voluptatem officia est, et voluptas delectus? Officia fugiat atque natus exercitationem non. Officiis repellat quas consequuntur quisquam, est consequatur ad reprehenderit distinctio culpa tempora tenetur excepturi minus nam ipsam inventore numquam quis. Expedita, repellendus animi, sit optio consequuntur ab saepe nisi deleniti velit odio unde tenetur tempora?', ' ...', 110) }}
          </p>
        </div>
        <div class="form-footer">
          <a href="/user/forms/show/123" class="btn btn-primary">Show More</a>
        </div>
      </div>
    </div>
  </div>
@endsection
