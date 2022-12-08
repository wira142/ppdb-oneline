@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center shadow rounded">
      <div class="col-md-8">
        <form method="POST">
          <div class="mb-5">
            <div class="row my-3 mt-5">
              <h2 class="fw-bold">Person Data</h2>
              <hr class="mb-4">
              <div class="col-md">
                <div class="mb-3">
                  <label for="nisn" class="form-label">NISN</label>
                  <input type="text" name="nisn" autofocus class="form-control" id="nisn">
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="number" name="nik" autofocus class="form-control" id="nik">
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="religion" class="form-label">Religion</label>
                  <select name="religion" id="religion" class="form-select">
                    <option value="">Islam</option>
                    <option value="">Kristen</option>
                    <option value="">Katolik</option>
                    <option value="">Hindu</option>
                    <option value="">Buddha</option>
                    <option value="">Konghucu</option>
                  </select>
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select name="gender" id="gender" class="form-select">
                    <option value="">Male</option>
                    <option value="">Female</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="birthplace" class="form-label">Birth Place</label>
                  <select name="birthplace" id="birthplace" class="form-select">
                    <option value="">Bandung</option>
                    <option value="">Jakarta</option>
                  </select>
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="birthdate" class="form-label">Birth Date</label>
                  <input type="date" name="birthdate" autofocus class="form-control" id="birthdate">
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control" id="phone">
                </div>
              </div>
              <div class="col-md">
                <label for="image_profile" class="form-label">Image Profile</label>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" id="image_profile">
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" name="address" class="form-control" id="address">
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="province" class="form-label">Province</label>
                  <select name="province" id="province" class="form-select">
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <select name="city" id="city" class="form-select">
                  </select>
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="district" class="form-label">District</label>
                  <select name="district" id="district" class="form-select">
                  </select>
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="village" class="form-label">Village</label>
                  <select name="village" id="village" class="form-select">
                  </select>
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
                  <select name="father_status" id="father_status" class="form-select border border-warning">
                    <option value="">Hidup</option>
                    <option value="">Meninggal</option>
                  </select>
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="number" name="nik" class="form-control" id="nik">
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="name_father" class="form-label">Name</label>
                  <input type="text" name="name_father" class="form-control" id="name_father">
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="study" class="form-label">Study</label>
                  <select name="study" id="study" class="form-select">
                    <option value="">SD</option>
                    <option value="">SMP</option>
                    <option value="">SMA/SMK</option>
                    <option value="">D3</option>
                    <option value="">S1</option>
                    <option value="">S2</option>
                    <option value="">S3</option>
                  </select>
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="father_job" class="form-label">Job</label>
                  <select name="father_job" id="father_job" class="form-select">
                    <option value="">PNS</option>
                    <option value="">POLISI</option>
                    <option value="">TNI</option>
                    <option value="">Pegawai Swasta</option>
                    <option value="">Wiraswasta</option>
                    <option value="">Buruh</option>
                    <option value="">Tidak Bekerja</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="father_salary" class="form-label">Salary</label>
                  <select name="father_salary" id="father_salary" class="form-select">
                    <option value="">Rp. 100.000 - Rp. 500.000</option>
                    <option value="">Rp. 500.000 - Rp. 1.000.000</option>
                    <option value="">Rp. 1.000.000 - Rp. 5.000.000</option>
                    <option value="">Rp. 5.000.000 - Rp. 10.000.000</option>
                    <option value="">Lebih dari Rp. 10.000.000</option>
                  </select>
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="father_phone" class="form-label">Phone</label>
                  <input type="text" name="father_phone" class="form-control" id="father_phone">
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
                  <select name="mother_status" id="mother_status" class="form-select border border-warning">
                    <option value="">Hidup</option>
                    <option value="">Meninggal</option>
                  </select>
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_nik" class="form-label">NIK</label>
                  <input type="number" name="mother_nik" class="form-control" id="nik">
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_name" class="form-label">Name</label>
                  <input type="text" name="mother_name" class="form-control" id="name_father">
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_study" class="form-label">Study</label>
                  <select name="mother_study" id="mother_study" class="form-select">
                    <option value="">SD</option>
                    <option value="">SMP</option>
                    <option value="">SMA/SMK</option>
                    <option value="">D3</option>
                    <option value="">S1</option>
                    <option value="">S2</option>
                    <option value="">S3</option>
                  </select>
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_job" class="form-label">Job</label>
                  <select name="mother_job" id="mother_job" class="form-select">
                    <option value="">PNS</option>
                    <option value="">POLISI</option>
                    <option value="">TNI</option>
                    <option value="">Pegawai Swasta</option>
                    <option value="">Wiraswasta</option>
                    <option value="">Buruh</option>
                    <option value="">Tidak Bekerja</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_salary" class="form-label">Salary</label>
                  <select name="mother_salary" id="mother_salary" class="form-select">
                    <option value="">Rp. 100.000 - Rp. 500.000</option>
                    <option value="">Rp. 500.000 - Rp. 1.000.000</option>
                    <option value="">Rp. 1.000.000 - Rp. 5.000.000</option>
                    <option value="">Rp. 5.000.000 - Rp. 10.000.000</option>
                    <option value="">Lebih dari Rp. 10.000.000</option>
                  </select>
                </div>
              </div>
              <div class="col-md">
                <div class="mb-3">
                  <label for="mother_phone" class="form-label">Phone</label>
                  <input type="text" name="mother_phone" class="form-control" id="mother_phone">
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
      offAll();
      $.ajax({
        url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
        type: 'GET',
        dataType: 'json',
        success: res =>
          $.map(res.provinsi, function(val, index) {
            $('#province').append(
              `<option value="${val.id}">${val.nama}</option>`
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
@endsection
