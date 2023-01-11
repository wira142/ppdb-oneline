@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow rounded p-5">
                <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-4">
                        <h3>Profile</h3>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <div class="row p-0 align-items-center">
                            <div class="col-md-3">
                                @if (!$data->image)
                                <img src="{{asset('storage/dummy/profile-dummy-2.jpg')}}" class="img-fluid rounded" alt="prfile-image" id="imgPreview">
                                <p class="text-danger mb-md-0" id="abnormal">*your image is not set</p>
                                @else
                                <img src="{{asset('storage/profile-images/'.$data->image)}}" class="img-fluid rounded" alt="prfoile-image" id="imgPreview">
                                @endif
                            </div>
                            <div class="col-md-9">
                                    <label for="image" class="form-label">Choose New Image</label>
                                    <input type="file" name="image" value="{{ old('image') }}"
                                    class="form-control @error('image') is-invalid @enderror" id="image">
                                    <span class="text-secondary">*recomendation shape is rectangular</span>
                                    @error('image')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ old('name', $data->name) }}" name="name" autofocus
                        class="form-control @error('name') is-invalid @enderror" id="name">
                        @error('name')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Change Password</label>
                        <input type="password" value="{{ old('password') }}" name="password" autofocus
                        class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" value="{{ old('confirm_password') }}" name="confirm_password" autofocus
                        class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password">
                        @error('confirm_password')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $(document).ready(() => {
      $('#image').change(function() {
        const file = this.files[0];
        if (file) {
          let reader = new FileReader();
          reader.onload = function(event) {
            $('#imgPreview').attr('src', event.target.result);
            $('#abnormal').remove();
          }
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
@endsection