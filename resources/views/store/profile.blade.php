@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Voucher Verification</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif


                    <div class="icon-block text-center"><img src="{{ asset('media/icon/user.png') }}" width="92px" alt="profile-image" class="profile"/></div>
                        <h5 class="card-title text-center">{{ucfirst($beneficiary->fname)}}  {{ucfirst($beneficiary->mname)}} {{ucfirst($beneficiary->lname)}}</h5>
                        <p class="card-text text-center">Mobile Phone: <a href="tel:{{$beneficiary->phone}}">{{$beneficiary->phone}}</a></p>
                        <p class="card-text text-center">National ID Number: <a href="#">{{$beneficiary->idnumber}}</a></p>
                        <p class="card-text text-center">County: <a href="#">{{$beneficiary->residence->name}}</a></p>
                        <div class="icon-block text-center"><h5 class="card-title text-center">Voucher : @if($beneficiary->voucher->count()>0)<strong style="background-color:#3490dc">


                            @foreach($beneficiary->voucher as $voucher)
                            @if ($loop->first)

                            {{$voucher->voucher->code}}  </strong> &nbsp;&nbsp;&nbsp;&nbsp; @if($voucher->voucher->status==1)<button type="button" onclick="myFunction()" class="btn btn-info btn-sm">Redeem</button> @elseif($voucher->voucher->status==2)<button type="button" class="btn btn-success btn-sm">Already Redeemed</button>@endif

                            <form id="redeem" action="{{ route('redeem.voucher') }}" method="POST" style="display: none;">
                                @csrf
                                <input  name="id" value="{{$voucher->voucher->id}}" hidden>
                            </form>

                            @endif
                            @endforeach


                            @else No Voucher  @endif</h5></div>




                        {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a> --}}


                </div>
            </div>
        </div>
    </div>
</div>

    <script>
function myFunction() {
  var txt;
  if (confirm("Are you sure you want to redeeem?")) {
    document.getElementById('redeem').submit();
  } else {
    document.getElementById("demo").innerHTML = txt;
  }

}
</script>

@endsection
