<div class="row my-5 justify-content-center">
  <div class="col-md-8">
    <form method="get" action="{{ route('find-school') }}">
      <label for="exampleInputEmail1" class="form-label">Find Schools</label>
      <div class="input-group input-group-lg mb-3">
        <input type="text" class="form-control" value="{{ old('keyword', @$keyword) }}" name="keyword"
          placeholder="Name School" aria-describedby="basic-addon2">
        <button class="btn btn-outline-warning" type="submit" id="inputGroupFileAddon03">Search</button>
      </div>
    </form>
  </div>
</div>
