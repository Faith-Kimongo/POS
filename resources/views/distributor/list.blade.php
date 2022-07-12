@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <div class="row">
{{-- includde --}} @include('distributor.sidebar')
                        <div class="col-sm-9">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"> <strong>Beneficiary List</strong></h5>


                              <div class="row">
                                <div class="col-sm-12">
                                {{-- <div class="card"> --}}
                                  <div class="card-body">
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>ID Number</th>
                                                <th>Phone</th>
                                                <th>DOB</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($beneficiaries as  $beneficiary)
                                            <tr>
                                                <td>{{$beneficiary->id}}</td>
                                                <td> <a href="/distributor/beneficiary/{{$beneficiary->id}}">{{ucfirst($beneficiary->fname)}} {{ucfirst($beneficiary->mname)}} {{ucfirst($beneficiary->lname)}} </a></td>
                                                <td>{{$beneficiary->idnumber}} </td>
                                          <td><a href="#">{{$beneficiary->phone}} </a></td>
                                                <td data-order="1000">{{$beneficiary->dob}} </td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
<script>
    $(document).ready(function() {
  // DataTable initialisation
  $('#example').DataTable({
    "paging": true,
    "autoWidth": true,
    "columnDefs": [
      {
        "targets": 3,
        "render": function(data, type, full, meta) {
          var cellText = $(data).text(); //Stripping html tags !!!
          if (type === 'display' &&  (cellText == "Done" || data=='Done')) {
            var rowIndex = meta.row+1;
            var colIndex = meta.col+1;
            $('#example tbody tr:nth-child('+rowIndex+')').addClass('lightRed');
            $('#example tbody tr:nth-child('+rowIndex+') td:nth-child('+colIndex+')').addClass('red');
            return data;
          } else {
            return data;
          }
        }
      }
    ]
  });
});
</script>

                                  </div>
                                {{-- </div> --}}
                              </div>

                            </div>

                            </div>
                          </div>
                        </div>
                      </div>


                </div>
            </div>
        </div>
    </div>
</div>
@include('distributor.new')
@endsection
