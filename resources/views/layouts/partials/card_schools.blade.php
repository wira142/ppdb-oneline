<div class="d-flex gap-3 justify-content-center justify-content-md-start flex-wrap">
  @if ($schools)
    @foreach ($schools as $school)
      <div class="card card-school">
        <div class="card-school-img">
          <img src="{{ asset('storage/school_images/' . $school->school_image) }}" class="img-fluid" alt="school-image">
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold">{{ substr_replace($school->name, strlen($school->name) > 35 ? '...' : '', 36) }}
          </h5>
          <p class=""><i class="fa-solid fa-location-crosshairs"></i> {{ $school->city }}</p>
          <p class="">{{ substr_replace($school->description, '...', 60) }}</p>
        </div>
        <div class="text-end card-footer">
          <a href="/schools/show/{{ $school->school_id }}" class="btn btn-success">View More</a>
        </div>
      </div>
    @endforeach
  @else
    <h5 class="text-center fw-bold">data not available!</h5>
  @endif
</div>
