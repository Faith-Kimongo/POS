@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <a href="/Dashboard">Dashboard</a></div>

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
                  <div class="col-md-9">
                    <div class="card">
                        <div class="card-header"> {{$batch->name}} Batch Summary</div>
                      <div class="card-body">
                        {{-- <h5 class="card-title"> <strong></strong></h5> --}}
                        Created By : <strong>{{$batch->user->name}}</strong><br>
                        Vouchers Generated : <strong>{{number_format($batch->voucher->count())}} </strong><br>
                        Vouchers Issued : <strong>{{$batch->voucher->where('status','<>',0)->count()}} </strong><br>
                        Vouchers Redeemed : <strong>{{$batch->voucher->where('status','=',2)->count()}} </strong><br>
                        
                        Created On : <strong> {{$batch->created_at->format('Y-m-d')}}</strong>

                        <div class="row">
                            <div class="col-sm-9">
                            {{-- <div class="card"> --}}
                              <div class="card-body">

                              </div>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            
                          <div class="col-sm-12">
                          <div class="card">
                            <div class="card-header">Batch Voucher Summary</div>
                            <div class="card-body">
                              <table id="example" class="table  table-bordered" cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Beneficiary</th>
                                          <th>Code</th>
                                          <th>Issued By</th>
                                          <th>Issued On</th>
                                          <th>Status</th>
                                          <th>Redeemed at</th>
                                          <th>Redeemed On</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      {{-- @foreach (Auth::user()->batch as  $batch) --}}
                                      @foreach($batch->beneficiary as $beneficiary)
                                      @if (!empty($beneficiary->assigned)) 
                                      <tr>
                                          <td><div style="height:20px; overflow:hidden">{{$beneficiary->id}}</div></td>
                                          <td> <div style="height:20px; overflow:hidden"><a href="/management/beneficiary/{{$beneficiary->id}}">{{ucfirst($beneficiary->fname)}} {{ucfirst($beneficiary->mname)}} {{ucfirst($beneficiary->lname)}} </a> </div></td>
                                          
                                          <td><div style="height:20px; overflow:hidden">
                                           
                                            @if($beneficiary->assigned->count()>0)
                                              {{$beneficiary->assigned->voucher->code}}
                                              @else 
                                              @endif
                                          </div>
                                          </td>
                                          <td><div style="height:20px; overflow:hidden">{{$beneficiary->assigned->user['name']}}</div></td>
                                          <td><div style="height:20px; overflow:hidden">{{$beneficiary->assigned->created_at}} </div></td>
                                          <td @if($beneficiary->assigned->voucher->status==0) @elseif($beneficiary->assigned->voucher->status==1) style="background-color:#03A9F4" @elseif($beneficiary->assigned->voucher->status==2) style="background-color:#7dea82" @elseif($beneficiary->assigned->voucher->status==3) style="background-color:red" @endif> <div style="height:20px; overflow:hidden">@if($beneficiary->assigned->voucher->status==0) @elseif($beneficiary->assigned->voucher->status==1) Issued @elseif($beneficiary->assigned->voucher->status==2) Redeemed @elseif($beneficiary->assigned->voucher->status==3) Revoked @endif </div></td>
                                          <td>{{$beneficiary->assigned->store['name']}} </td>
                                          <td>{{$beneficiary->assigned->redeemed_on}} </td>
                                      </tr>
                                      @endif
                                      @endforeach
                                      {{-- @endforeach --}}
                                  </tbody>
                              </table>
<script>
$(document).ready(function() {
    // document.title={ !! json_encode($batch->name) !!};
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
</div>
@endsection
