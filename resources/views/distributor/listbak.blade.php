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
                        <div class="col-sm-3 mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title text-left"> <strong> Packages Assigned </strong></h5>
                                {{-- @foreach ($packages as $package ) --}}
                                {{-- {{$package->name}} <br> --}}
                                packages names
                                {{-- @endforeach --}}
                                <h5 class="card-title text-left mt-2 mb-0"> <strong>Families </strong></h5>
                                <a href="/distributor/list">List</a> <br>
                                <a href="/distributor/list">Issue Package</a> <br>
                              <a href="#" data-toggle="modal" data-target="#asign">New +</a>
                              </div>
                            </div>
                          </div>
                        <div class="col-sm-9">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Beneficiary List</h5>


                              <div class="row">
                                <div class="col-sm-12">
                                {{-- <div class="card"> --}}
                                  <div class="card-body">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>


                                <script type="text/javascript">
                                  $(function () {

                                    var table = $('.data-table').DataTable({
                                        processing: true,
                                        serverSide: true,
                                        ajax: "{{ route('users.index') }}",
                                        columns: [
                                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                            {data: 'name', name: 'name'},
                                            {data: 'email', name: 'email'},
                                            {data: 'action', name: 'action', orderable: false, searchable: false},
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

@endsection
