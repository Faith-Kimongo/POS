@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <a href="/management/batch">Dashboard</a></div>

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
                      <div class="card-header"> <strong>Beneficiary List</strong></div>
                      <div class="card-body">
                        {{-- <h5 class="card-title"> <strong>Beneficiary List</strong></h5> --}}


                        <div class="row">
                          <div class="col-sm-12">
                          {{-- <div class="card"> --}}
                            <div class="card-body">

                              {{-- total beneficiary :{{$user->manbeneficiaries->count()}} --}}
                              <table id="example" class="table  table-bordered" cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Beneficiary</th>
                                          <th>Code</th>
                                          <th>Issued By</th>
                                          <th>Issued On</th>
                                          <th>Redeemed On</th>
                                          <th>Redeemed at</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($user->batch as  $batch)
                                      @foreach($batch->beneficiary as $beneficiary)

                                      @if(empty($beneficiary->assigned))@else 
                                      <tr style="max-height: 10px;">
                                          <td>{{$beneficiary->id}}</td>
                                          <td> <a href="/distributor/beneficiary/{{$beneficiary->id}}">{{ucfirst($beneficiary->fname)}} {{ucfirst($beneficiary->mname)}} {{ucfirst($beneficiary->lname)}} </a></td>
                                          
                                          <td>
                                            @if(empty($beneficiary->assigned->voucher))@else
                                            {{$beneficiary->assigned->voucher->code}}
                                            @endif
                                          </td>
                                          <td>{{$beneficiary->assigned->user['name']}}</td>
                                          <td>{{$beneficiary->assigned->created_at}}</td>
                                          <td>{{$beneficiary->assigned->redeemed_on}} </td>
                                          <td>{{$beneficiary->assigned->store['name']}} </td>
                                      </tr>
                                      @endif
                                      @endforeach
                                      @endforeach
                                  </tbody>
                              </table>
<script>
$(document).ready(function() {
    document.title='Beneficiary Report';
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
