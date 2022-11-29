@extends('layouts.app')

@section('content')
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-10 show-schools-image mb-4">
        <img src="{{ asset('storage/schools_image/school_building.jpg') }}" alt="" class="img-fluid">
      </div>
      <div class="col-md-10 title-school">
        <h3 class="fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta perspiciatis in at.</h3>
        <p><i class="fa-solid fa-location-crosshairs"></i> Indonesia . Bandung</p>
        <hr>
      </div>
      <div class="col-md-10 description my-3">
        <h4>School Description</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nesciunt asperiores aliquid quasi alias inventore
          hic aperiam nemo sunt ea consequatur modi natus voluptates fugiat delectus aliquam, odio dignissimos quod
          voluptas, explicabo sequi doloremque placeat minima? Repellendus exercitationem impedit, aut, quae dignissimos
          rerum ab, vel reprehenderit architecto tempora aliquam debitis!
        </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, tempora illo. Delectus dignissimos nulla eveniet
          maiores atque natus eos. Neque nemo maiores adipisci architecto autem deleniti et quod eaque rem.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam voluptate non soluta mollitia placeat. Harum iure
          beatae laudantium et quis facere temporibus, deserunt, tenetur eaque pariatur architecto mollitia iusto sit
          repudiandae dolore ut aut quos repellat ratione reprehenderit eos expedita. Maxime labore aspernatur quaerat
          minima facilis, facere doloremque corrupti fugit maiores nisi odio culpa aliquam numquam assumenda fugiat dolore
          iusto.</p>
      </div>
      <div class="col-md-10 school-location">
        <div class="row">
          <div class="col-md-6 d-flex gap-2 align-items-center">
            <i class="fa-solid fa-location-dot fa-xl"></i>
            <p class="fw-bold mb-0">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum
              voluptas
              eos vel.
            </p>
          </div>
          <div class="col-md-6 text-end">
            <a href="/schools/registration" class="btn btn-outline-warning btn-lg">Register Now!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
