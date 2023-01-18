@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 shadow rounded">
        <form action="{{ route('store-new-poster') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row py-3">
            <div class="col-12">
              <h3>My Forms</h3>
              <hr>
            </div>
            <div class="col-md-4">
              <img src="{{ asset('storage/dummy/poster.jpg') }}" id="poster" class="img-fluid rounded mx-auto"
                alt="poster">
              <div class="mt-3">
                <label for="poster-input" class="form-label">Choose New Poster</label>
                <input type="file" value="{{ old('poster') }}" name="poster"
                  class="form-control @error('poster') is-invalid @enderror" id="poster-input">
                @error('poster')
                  <div id="validationServer04Feedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-8">
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" value="{{ old('title') }}" name="title"
                  class="form-control @error('title') is-invalid @enderror" id="title">
                @error('title')
                  <div id="validationServer04Feedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="due-date" class="form-label">Due Date</label>
                <input type="date" name="time_expired" value="{{ old('time_expired') }}"
                  class="form-control @error('time_expired') is-invalid @enderror" id="due-date">
                @error('time_expired')
                  <div id="validationServer04Feedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="degree" class="form-label">Degree</label>
                <select id="degree" name="degree" class="form-select @error('degree') is-invalid @enderror">
                  <option value="SD" @if (old('degree') == 'SD') selected @endif>SD</option>
                  <option @if (old('degree') == 'SMP') selected @endif value="SMP">SMP</option>
                  <option @if (old('degree') == 'SMA/SMK') selected @endif value="SMA/SMK">SMA/SMK</option>
                  <option @if (old('degree') == 'D3') selected @endif value="D3">D3</option>
                  <option @if (old('degree') == 'Sarjana') selected @endif value="Sarjana">Sarjana</option>
                </select>
                @error('degree')
                  <div id="validationServer04Feedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="desc"
                  cols="30" rows="6">{{ old('description') }}</textarea>
                @error('description')
                  <div id="validationServer04Feedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection


@section('script')
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>
    $(document).ready(() => {
      $('#poster-input').change(function() {
        const file = this.files[0];
        if (file) {
          let reader = new FileReader();
          reader.onload = function(event) {
            $('#poster').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
@endsection
