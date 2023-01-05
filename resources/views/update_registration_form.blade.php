@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center shadow rounded">
      <div class="col-md-8">
        @if (session('query'))
          <div class="alert alert-danger">
            {{ session('query') }}
          </div>
        @endif
        <form method="post" action="{{ route('update_registration_form') }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="mb-5">
            <div class="row my-3 mt-5">
              <h2 class="fw-bold">Person Data</h2>
              <hr class="mb-4">
              <div class="col-md">
                <div class="mb-3">
                  <label for="nisn" class="form-label">NISN</label>
                  <input type="text" value="{{ old('nisn', $personal->nisn) }}" name="nisn" autofocus
                    class="form-control @error('nisn') is-invalid @enderror" id="nisn">
                  @error('nisn')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="text" name="nik" value="{{ old('nik', $personal->nik) }}" autofocus
                    class="form-control @error('nik') is-invalid @enderror" id="nik">
                  @error('nik')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="religion" class="form-label">Religion</label>
                  <select name="religion" id="religion" class="form-select @error('religion') is-invalid @enderror">
                    <option value="Islam" @selected(old('religion', $personal->religion) == 'Islam')>Islam</option>
                    <option value="Kristen" @selected(old('religion', $personal->religion) == 'Kristen')>Kristen</option>
                    <option value="Katolik" @selected(old('religion', $personal->religion) == 'Katolik')>Katolik</option>
                    <option value="Hindu" @selected(old('religion', $personal->religion) == 'Hindu')>Hindu</option>
                    <option value="Buddha" @selected(old('religion', $personal->religion) == 'Buddha')>Buddha</option>
                    <option value="Konghucu" @selected(old('religion', $personal->religion) == 'Konghucu')>Konghucu</option>
                  </select>
                  @error('religion')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option value="Male" @selected(old('gender', $personal->gender) == 'male')>Male</option>
                    <option value="Female" @selected(old('gender', $personal->gender) == 'Female')>Female</option>
                  </select>
                  @error('gender')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="birthplace" class="form-label">Birth Place</label>
                  <input type="text" value="{{ old('birthplace', $personal->birthplace) }}" name="birthplace"
                    class="form-control @error('birthplace') is-invalid @enderror" id="birthplace">
                  @error('birthplace')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="birthdate" class="form-label">Birth Date</label>
                  <input type="date" value="{{ old('birthday', $personal->birthday) }}" name="birthday"
                    class="form-control @error('birthday') is-invalid @enderror" id="birthdate">
                  @error('birthday')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3 mx-auto" style="">
                  @if ($personal != null)
                    <img id="imgPreview" class="pas-photo"
                      src="{{ asset('storage/personal_images/' . $personal->image) }}" alt="">
                  @else
                    <img id="imgPreview" src="{{ asset('storage/profile_image/profile.jpg') }}" alt="">
                  @endif
                </div>
                <label for="imageprofile" class="form-label">Image Profile</label>
                <div class="input-group mb-3">
                  <input type="file" value="{{ old('image', $personal->image) }}" name="image" id="imageprofile"
                    class="form-control @error('imageprofile')is-invalid @enderror">

                  <div class="container text-secondary">*recomendation size is 2x3, 3x4 and 4x6</div>

                  @error('image')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" value="{{ old('phone', $personal->phone) }}" name="phone"
                    class="form-control @error('phone') is-invalid @enderror" id="phone">
                  @error('phone')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" value="{{ old('address', $personal->address) }}" name="address"
                    class="form-control @error('address') is-invalid @enderror" id="address">
                  @error('address')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="province" class="form-label">Province</label>
                  <select name="province" id="province" class="form-select @error('province') is-invalid @enderror">
                  </select>
                  @error('province')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <select name="city" id="city" class="form-select @error('city') is-invalid @enderror">
                  </select>
                  @error('city')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="district" class="form-label">District</label>
                  <select name="district" id="district" class="form-select @error('district') is-invalid @enderror">
                  </select>
                  @error('district')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="village" class="form-label">Village</label>
                  <select name="village" id="village" class="form-select @error('village') is-invalid @enderror">
                  </select>
                  @error('village')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="mb-5">
            <div class="row">
              <div class="col-md">
                <h2 class="fw-bold">Father Data</h2>
              </div>
              <div class="col-auto">
                <div class="mb-3 d-flex align-items-center gap-3">
                  <label for="father_status" class="form-label mb-0 fw-bold">Status</label>
                  <select name="father_status" id="father_status"
                    class="form-select border border-warning @error('father_status') is-invalid @enderror">
                    <option value="Hidup" @selected(old('father_status', $father->status) == 'Hidup')>Hidup</option>
                    <option value="Meninggal" @selected(old('father_status', $father->status) == 'Meninggal')>Meninggal</option>
                  </select>
                  @error('father_status')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="father_nik" class="form-label">NIK</label>
                  <input type="text" value="{{ old('father_nik', $father->nik) }}" name="father_nik"
                    class="form-control @error('father_nik') is-invalid @enderror" id="father_nik">
                  @error('father_nik')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="father_name" class="form-label">Name</label>
                  <input type="text" value="{{ old('father_name', $father->name) }}" name="father_name"
                    class="form-control @error('father_name') is-invalid @enderror" id="father_name">
                  @error('father_name')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="study" class="form-label">Study</label>
                  <select name="father_study" id="study"
                    class="form-select @error('father_study') is-invalid @enderror">
                    <option value="SD" @selected(old('father_study', $father->study) == 'SD')>SD</option>
                    <option value="SMP" @selected(old('father_study', $father->study) == 'SMP')>SMP</option>
                    <option value="SMA/SMK" @selected(old('father_study', $father->study) == 'SMA/SMK')>SMA/SMK</option>
                    <option value="D3" @selected(old('father_study', $father->study) == 'D3')>D3</option>
                    <option value="S1" @selected(old('father_study', $father->study) == 'S1')>S1</option>
                    <option value="S2" @selected(old('father_study', $father->study) == 'S2')>S2</option>
                    <option value="S3" @selected(old('father_study', $father->study) == 'S3')>S3</option>
                  </select>
                  @error('father_study')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="father_job" class="form-label">Job</label>
                  <select name="father_job" id="father_job"
                    class="form-select @error('father_job') is-invalid @enderror">
                    <option value="PNS" @selected(old('father_job', $father->study) == 'PNS')>PNS</option>
                    <option value="POLISI" @selected(old('father_job', $father->study) == 'POLISI')>POLISI</option>
                    <option value="TNI" @selected(old('father_job', $father->study) == 'TNI')>TNI</option>
                    <option value="PEGAWAI SWASTA" @selected(old('father_job', $father->study) == 'PEGAWAI SWASTA')>Pegawai Swasta</option>
                    <option value="WIRASWASTA" @selected(old('father_job', $father->study) == 'WIRASWASTA')>Wiraswasta</option>
                    <option value="BURUH" @selected(old('father_job', $father->study) == 'BURUH')>Buruh</option>
                    <option value="TIDAK BEKERJA" @selected(old('father_job', $father->study) == 'TIDAK BEKERJA')>Tidak Bekerja</option>
                  </select>
                  @error('father_job')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="father_salary" class="form-label">Salary</label>
                  <select name="father_salary" id="father_salary"
                    class="form-select @error('father_salary') is-invalid @enderror">
                    <option value="Rp. 100.000 - Rp. 500.000" @selected(old('father_salary', $father->salary) == 'Rp. 100.000 - Rp. 500.000')>Rp. 100.000 - Rp. 500.000
                    </option>
                    <option value="Rp. 500.000 - Rp. 1.000.000" @selected(old('father_salary', $father->salary) == '')>Rp. 500.000 - Rp. 1.000.000
                    </option>
                    <option value="Rp. 1.000.000 - Rp. 5.000.000" @selected(old('father_salary', $father->salary) == 'Rp. 1.000.000 - Rp. 5.000.000')>Rp. 1.000.000 - Rp.
                      5.000.000</option>
                    <option value="Rp. 5.000.000 - Rp. 10.000.000" @selected(old('father_salary', $father->salary) == 'Rp. 5.000.000 - Rp. 10.000.000')>Rp. 5.000.000 - Rp.
                      10.000.000</option>
                    <option value="Lebih dari Rp. 10.000.000" @selected(old('father_salary', $father->salary) == 'Lebih dari Rp. 10.000.000')>Lebih dari Rp. 10.000.000
                    </option>
                  </select>
                  @error('father_salary')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="father_phone" class="form-label">Phone</label>
                  <input type="text" value="{{ old('father_phone', $father->phone) }}" name="father_phone"
                    class="form-control @error('father_phone') is-invalid @enderror" id="father_phone">
                  @error('father_phone')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-md">
                <h2 class="fw-bold">Mother Data</h2>
              </div>
              <div class="col-auto">
                <div class="mb-3 d-flex align-items-center gap-3">
                  <label for="mother_status" class="form-label mb-0 fw-bold">Status</label>
                  <select name="mother_status" id="mother_status"
                    class="form-select border border-warning @error('mother_status') is-invalid @enderror">
                    <option value="Hidup" @selected(old('mother_status', $mother->status) == 'Hidup')>Hidup</option>
                    <option value="Meninggal" @selected(old('mother_status', $mother->status) == 'Meninggal')>Meninggal</option>
                  </select>
                  @error('mother_status')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_nik" class="form-label">NIK</label>
                  <input type="text" value="{{ old('mother_nik', $mother->nik) }}" name="mother_nik"
                    class="form-control @error('mother_nik') is-invalid @enderror" id="nik">
                  @error('mother_nik')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_name" value="{{ old('mother_name') }}" class="form-label">Name</label>
                  <input type="text" value="{{ old('mother_name', $mother->name) }}" name="mother_name"
                    class="form-control @error('mother_name') is-invalid @enderror" id="name_father">
                  @error('mother_name')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_study" class="form-label">Study</label>
                  <select name="mother_study" id="mother_study"
                    class="form-select @error('mother_study') is-invalid @enderror">
                    <option value="SD" @selected(old('mother_study', $mother->study) == 'SD')>SD</option>
                    <option value="SMP" @selected(old('mother_study', $mother->study) == 'SMP')>SMP</option>
                    <option value="SMA/SMK" @selected(old('mother_study', $mother->study) == 'SMA/SMK')>SMA/SMK</option>
                    <option value="D3" @selected(old('mother_study', $mother->study) == 'D3')>D3</option>
                    <option value="S1" @selected(old('mother_study', $mother->study) == 'S1')>S1</option>
                    <option value="S2" @selected(old('mother_study', $mother->study) == 'S2')>S2</option>
                    <option value="S3" @selected(old('mother_study', $mother->study) == 'S3')>S3</option>
                  </select>
                  @error('mother_study')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_job" class="form-label">Job</label>
                  <select name="mother_job" id="mother_job"
                    class="form-select @error('mother_job') is-invalid @enderror">
                    <option value="PNS" @selected(old('mother_job', $mother->study) == 'PNS')>PNS</option>
                    <option value="POLISI" @selected(old('mother_job', $mother->study) == 'POLISI')>POLISI</option>
                    <option value="TNI" @selected(old('mother_job', $mother->study) == 'TNI')>TNI</option>
                    <option value="PEGAWAI SWASTA" @selected(old('mother_job', $mother->study) == 'PEGAWAI SWASTA')>Pegawai Swasta</option>
                    <option value="WIRASWASTA" @selected(old('mother_job', $mother->study) == 'WIRASWASTA')>Wiraswasta</option>
                    <option value="BURUH" @selected(old('mother_job', $mother->study) == 'BURUH')>Buruh</option>
                    <option value="TIDAK BEKERJA" @selected(old('mother_job', $mother->study) == 'TIDAK BEKERJA')>Tidak Bekerja</option>
                  </select>
                  @error('mother_job')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_salary" class="form-label">Salary</label>
                  <select name="mother_salary" id="mother_salary"
                    class="form-select @error('mother_salary') is-invalid @enderror">
                    <option value="Rp. 100.000 - Rp. 500.000" @selected(old('mother_salary', $mother->salary) == 'Rp. 100.000 - Rp. 500.000')>Rp. 100.000 - Rp. 500.000
                    </option>
                    <option value="Rp. 500.000 - Rp. 1.000.000" @selected(old('mother_salary', $mother->salary) == '')>Rp. 500.000 - Rp. 1.000.000
                    </option>
                    <option value="Rp. 1.000.000 - Rp. 5.000.000" @selected(old('mother_salary', $mother->salary) == 'Rp. 1.000.000 - Rp. 5.000.000')>Rp. 1.000.000 - Rp.
                      5.000.000</option>
                    <option value="Rp. 5.000.000 - Rp. 10.000.000" @selected(old('mother_salary', $mother->salary) == 'Rp. 5.000.000 - Rp. 10.000.000')>Rp. 5.000.000 - Rp.
                      10.000.000</option>
                    <option value="Lebih dari Rp. 10.000.000" @selected(old('mother_salary', $mother->salary) == 'Lebih dari Rp. 10.000.000')>Lebih dari Rp. 10.000.000
                    </option>
                  </select>
                  @error('mother_salary')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_phone" class="form-label">Phone</label>
                  <input type="text" value="{{ old('mother_phone', $mother->phone) }}" name="mother_phone"
                    class="form-control @error('mother_phone') is-invalid @enderror" id="mother_phone">
                  @error('mother_phone')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="my-5 text-end">
            <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection


@section('script')
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>
    const offAll = () => {
      $("#city").prop("disabled", true);
      $("#district").prop("disabled", true);
      $("#village").prop("disabled", true);
    }
    const clearAll = () => {
      $("#city").find('option')
        .remove()
        .end()
        .prop("disabled", true);
      $("#district").find('option')
        .remove()
        .end()
        .prop("disabled", true);
      $("#village").find('option')
        .remove()
        .end()
        .prop("disabled", true);
    }

    $(document).ready(function() {
      // offAll();
      $.ajax({
        url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
        type: 'GET',
        dataType: 'json',
        success: res =>
          $.map(res.provinsi, function(val, index) {
            $('#province').append(
              '<option value="' + val.id + '" ' +
              (val.id == {{ $personal->province }} ? 'selected' : '') +
              '>' + val.nama + '</option>'
            );
          })
      })

      $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi={{ $personal->province }}`,
        type: 'GET',
        dataType: 'json',
        success: res =>
          $.map(res.kota_kabupaten, function(val, index) {
            $('#city').append(
              '<option value="' + val.id + '" ' +
              (val.id == {{ $personal->city }} ? 'selected' : '') +
              '>' + val.nama + '</option>'
            );
          })
      })

      $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota={{ $personal->city }}`,
        type: 'GET',
        dataType: 'json',
        success: res =>
          // console.log(res)
          $.map(res.kecamatan, function(val, index) {
            $('#district').append(
              '<option value="' + val.id + '" ' +
              (val.id == {{ $personal->district }} ? 'selected' : '') +
              '>' + val.nama + '</option>'
            );
          })
      })

      $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan={{ $personal->district }}`,
        type: 'GET',
        dataType: 'json',
        success: res =>
          $.map(res.kelurahan, function(val, index) {
            $('#village').append(
              '<option value="' + val.id + '" ' +
              (val.id == {{ $personal->village }} ? 'selected' : '') +
              '>' + val.nama + '</option>'
            );
          })
      })

      $("#province").change(function() {
        clearAll();
        $("#city").find('option')
          .remove()
          .end()
          .prop("disabled", false);

        $.ajax({
          url: `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${$(this).val()}`,
          type: 'GET',
          dataType: 'json',
          success: res =>
            $.map(res.kota_kabupaten, function(val, index) {
              $('#city').append(
                `<option value="${val.id}">${val.nama}</option>`
              );
            })
        })

      });

      $("#city").change(function() {
        $("#district").find('option')
          .remove()
          .end()
          .prop("disabled", false);
        $("#village").find('option')
          .remove()
          .end()
          .prop("disabled", true);

        $.ajax({
          url: `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${$(this).val()}`,
          type: 'GET',
          dataType: 'json',
          success: res =>
            // console.log(res)
            $.map(res.kecamatan, function(val, index) {
              $('#district').append(
                `<option value="${val.id}">${val.nama}</option>`
              );
            })
        })

      });

      $("#district").change(function() {
        $("#village").find('option')
          .remove()
          .end()
          .prop("disabled", false);

        $.ajax({
          url: `https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=${$(this).val()}`,
          type: 'GET',
          dataType: 'json',
          success: res =>
            $.map(res.kelurahan, function(val, index) {
              $('#village').append(
                `<option value="${val.id}">${val.nama}</option>`
              );
            })
        })

      });

    });
  </script>
  <script>
    $(document).ready(() => {
      $('#imageprofile').change(function() {
        const file = this.files[0];
        console.log(file);
        if (file) {
          let reader = new FileReader();
          reader.onload = function(event) {
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
@endsection
