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
                                                <div class="col-sm-9 mt-3">
                                                  <div class="card">
                                                    <div class="card-body">

                                                      <div class="row">
                                                        <div class="col-sm-6 mb-2">
                                                          <div class="card">
                                                            <div class="card-body">
                                                              <h5 class="card-title text-center"> <strong> Beneficiary Information</strong></h5>
                                                              {{-- <div class="card profile-card-4"> --}}

                                                                <div class="card-body">
                                                                    {{-- <img src="{{ asset('media/logo/logo.png') }}" alt="profile-image" class="profile"/> --}}
                                                                    <h5 class="card-title text-center">Name : {{ucfirst($beneficiary->fname)}} {{ucfirst($beneficiary->mname)}} {{ucfirst($beneficiary->lname)}}</h5>

                                                                    <div class="icon-block text-center">ID Number : {{$beneficiary->idnumber}}</div>
                                                                    <div class="icon-block text-center">Phone : {{$beneficiary->phone}}</div>
                                                                    <div class="icon-block text-center">County : {{$beneficiary->residence->name}}</div>
                                                                    <div class="icon-block text-center">DOB : {{$beneficiary->dob}}</div>
                                                                </div>
                                                            {{-- </div> --}}
                                                            {{-- <p class="mt-3 w-100 float-left text-center"><strong>Dial a Guard</strong></p> --}}
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                          <div class="card">
                                                            <div class="card-body">
                                                              <h5 class="card-title"><strong> History </strong></h5>
                                                              @if($beneficiary->voucher->count() >0)
                                                              @foreach($beneficiary->voucher as $voucher)
                                                              <p class="card-text">{{$voucher->voucher->code}}</p>
                                                              @endforeach
                                                              @else
                                                              No Voucher Assigned yet
                                                              @endif
                                                              <p><a href="#" data-toggle="modal" data-target="#issue">New +</a></p>
                                                              {{-- <p class="card-text"> <a href="#"><img width="72px" src="{{ asset('media/logo/playstore.png') }}"> </a> <a href="#"><img width="120px" src="{{ asset('media/logo/appstore.jpg') }}"></a></p> --}}

                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>





                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('assign.voucher') }}">
            @csrf
        <input type="text" hidden name="beneficiary" value="{{$beneficiary->id}}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asssign Voucher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <div class="form-group row">

                    <div class="col-md-10">


                                  <label for="email" class="col-md-10  ml-0 col-form-label mr-sm-2 text-md-left">{{ __('Batch Name') }}</label>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                            <div class="form-group">
                                <div class="input-group">
                                    {{-- <select class="custom-select ml-3 col-md-10" name="package" id="inlineFormCustomSelect">
                                        <option selected>Select Package</option>

                                          @foreach ( Auth::user()->distributor as $distri )
                                        <option value="{{$distri->id}}">{{$distri->package['name']}}</option>
                                        @endforeach


                                      </select> --}}
                                      @foreach ( Auth::user()->batchasign as $distri )
                                  <input type="text" class="form-control ml-3" readonly name="name"  id="formGroupExampleInput" placeholder="{{$distri->batch->name}}">
                                  @endforeach
                                </div>
                                </div>

                    </div>

                </div>
                <div class="form-group row">

                    <div class="col-md-10">


                                  <label for="email" class="col-md-10  ml-0 col-form-label mr-sm-2 text-md-left">{{ __('Voucher') }}</label>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" hidden class="form-control ml-3" name="beneficiary"  id="formGroupExampleInput" value= "{{$beneficiary->id}}"placeholder="{{$beneficiary->id}}">
                                    @if (empty($code))
                                    <strong class="ml-3" style="color:red">All Vouchers have been asigned!!! </strong>

                                    @else
                                    <input type="text" hidden class="form-control ml-3" name="code"  id="formGroupExampleInput" value="{{$code->id}}" placeholder="{{$code->id}}">

                                  <input type="text" class="form-control ml-3" name="quantity" readonly  id="formGroupExampleInput" placeholder="{{$code->code}}">
                                  @endif
                                </div>
                                </div>

                    </div>

                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Asign</button>
        {{-- </form> --}}
        </div>
    </form>
      </div>
    </div>
@include('distributor.new')


@endsection
