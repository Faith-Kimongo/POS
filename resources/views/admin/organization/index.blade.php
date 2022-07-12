@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <a href="/Dashboard/">Dashboard</a></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="row">
                  @include('admin.sidebar')
                  <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header"> Organizations</div>
                      <div class="card-body">
                        {{-- <h5 class="card-title"> <strong>Collection Points</strong></h5> --}}


                        <div class="row">
                          <div class="col-sm-12">
                          {{-- <div class="card"> --}}
                            <div class="card-body">
                              <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Name</th>
                                          <th>Phone</th>
                                          <th>Email</th>
                                          <th>Location</th>
                                          {{-- <th>Vouchers Issued</th> --}}
                                          
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($collection as  $collection)
                                      <tr>
                                          <td></td>
                                          @if(Auth::id()== 1)
                                      <td> <a href="/admin/organization/{{$collection->id}}">{{ucfirst($collection->name)}}</a></td>
                                        @else
                                        <td> <a href="#">{{ucfirst($collection->name)}}</a></td>
                                        @endif
                                          <td><a href="tel:{{$collection->phone}}">{{$collection->phone}}</a></td>
                                          <td><a href="mailto:{{$collection->email}}">{{$collection->email}}</a></td>
                                          {{-- <td>{{ucfirst($collection->location)}}</td> --}}
                                          <td>{{$collection->location}}</td> 
                                      </tr>

                                      @endforeach
                                  </tbody>
                              </table>
<script>
$(document).ready(function() {
    document.title='ZDDMS Organizations';
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
<script>
    var table = document.getElementsByTagName('table')[0],
  rows = table.getElementsByTagName('tr'),
  text = 'textContent' in document ? 'textContent' : 'innerText';

for (var i = 1, len = rows.length; i < len; i++) {
  rows[i].children[0][text] = i + '. ' + rows[i].children[0][text];
}
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
@endsection
