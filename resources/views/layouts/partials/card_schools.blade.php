<div class="d-flex gap-4 list-card-schools flex-wrap">
  @for ($i = 0; $i < 3; $i++)
    <div class="card">
      <img src="{{ asset('storage/schools_image/school_building.jpg') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title fw-bold">Title Schools</h5>
        <p class="card-text"><i class="fa-solid fa-location-crosshairs"></i> Indonesia . Bandung</p>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...
        </p>
      </div>
      <div class="text-end card-footer">
        <a href="/schools/show" class="btn btn-success">View More</a>
      </div>
    </div>
  @endfor
</div>
