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
                <h5 class="card-title text-center">Beneficiaries</h5>
                <ol>
                    <li><a href="/store/beneficiary/{{$beneficiary->phone}}" >{{ucfirst($beneficiary->fname)}}  {{ucfirst($beneficiary->mname)}} {{ucfirst($beneficiary->lname)}} </a> </li>
                </ol>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
