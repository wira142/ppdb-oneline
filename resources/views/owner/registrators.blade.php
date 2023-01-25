@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 shadow rounded bg-light p-4">
        <h3>Registrators</h3>
        <hr>
        <div class="filter-table my-4 d-flex justify-content-end">
          <form action="">
            <select class="form-select" id="filter" onchange="sortTable(this.value)">
              <option>filter</option>
              <option value="status">Status</option>
            </select>
          </form>
        </div>
        <table class="table align-middle table-striped table-hover" id="myTable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Photo</th>
              <th scope="col">NISN</th>
              <th scope="col">Name</th>
              <th scope="col">Form Name</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($students)
              @foreach ($students as $key => $student)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>
                    <div class="pas-photo" style="max-width: 60px">
                      <img src="{{ $student->image }}" alt="profile-image" class="img-fluid rounded">
                    </div>
                  </td>
                  <td>{{ $student->personal->nisn }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->form_name }}</td>
                  <td>
                    @if ($student->status_form == 'register')
                      <p class="text-warning mb-0">{{ $student->status_form }}</p>
                    @elseif ($student->status_form == 'qualify' || $student->status_form == 'accepted')
                      <p class="text-success mb-0">{{ $student->status_form }}</p>
                    @elseif ($student->status_form == 'rejected')
                      <p class="text-danger mb-0">Rejected</p>
                    @endif
                  </td>
                  <td><a href="/user/registrators/{{ $student->id }}/{{ $student->registration_id }}"
                      class="btn btn-outline-primary">Action</a></td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="7">Registrators not found!</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>
    function sortTable(value) {
      if (value == "status") {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("myTable");
        switching = true;
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
          //start by saying: no switching is done:
          switching = false;
          rows = table.rows;
          /*Loop through all table rows (except the
          first, which contains table headers):*/
          for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[5];
            y = rows[i + 1].getElementsByTagName("TD")[5];
            //check if the two rows should switch place:
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
          if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
          }
        }
        rows = table.rows;
        for (i = 1; i < (rows.length); i++) {
          rows[i].getElementsByTagName("th")[0].innerHTML = i;
        }
      }
    }
  </script>
@endsection
