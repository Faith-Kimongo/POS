@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <a href="/distribute">Dashboard </a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <div class="row">
{{-- includde --}} @include('distributor.sidebar')
                        <div class="col-sm-9 mt-3">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Package Summary</strong></h5>
@if($pack->count()>0)
                              @foreach ($pack as $pack)
                              @if ($loop->first)
                              <div class="row">
                                <div class="col-sm-6 mb-3">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title">Stock</h5>

                                    @if(isset($pack->issue))
                                    Issued : {{$pack->issue->sum('quantity')}} <br>
                                    Left : {{$pack->left($pack->id)}} <br>
                                                @else
                                                You haven't been assigned any package yet <br>
                                                @endif
                                    {{-- Issued : {{$pack->issue->sum('quantity')}} <br> --}}
                                    {{-- Left : {{$pack->left($pack->id)}} <br> --}}
                                    <strong>Total</strong> : {{$pack->quantity}} <br>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title">Quick Statistics</h5>
                                    Beneficiaries : {{Auth::user()->beneficiaries->count()}} <br>
                                    Packages Assigned: {{Auth::user()->distributor->count()}} <br>
                                    Quantity Issued : {{$pack->issue->sum('quantity')}} <br>

                                  </div>
                                </div>
                              </div>
                            </div>

                            </div>
                          </div>
                        </div>
                      </div>

                    @endif
                    @endforeach
                    @else
                    No Package assigned yet!!
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@include('distributor.new')
  @endsection
