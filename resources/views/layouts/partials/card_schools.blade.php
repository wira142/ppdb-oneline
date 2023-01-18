<div class="d-flex gap-3 flex-wrap">
  @if (@$schools)
    @foreach ($schools as $school)
      <div class="card card-school">
        <img src="{{ asset('storage/school_images/' . $schools[0]->school_image) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title fw-bold">{{ $schools[0]->name }}</h5>
          <p class=""><i class="fa-solid fa-location-crosshairs"></i> {{ $schools[0]->city }}</p>
          <p class="">{{ substr_replace($schools[0]->description, ' ...', 60) }}</p>
        </div>
        <div class="text-end card-footer">
          <a href="/schools/show/{{ $school->school_id }}" class="btn btn-success">View More</a>
        </div>
      </div>
    @endforeach
  @else
    <h5 class="text-center fw-bold">school data not available!</h5>
  @endif
</div>
