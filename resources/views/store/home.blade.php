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

                    <form id="voucher" action="{{ route('verify.voucher') }}" method="POST" >
                        @csrf
                        <input class="form-control" required placeholder="Enter Voucher Code" type="text" name="idnumber" value="">
                    <input hidden type="text" name="batch" value="">
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-sm mt-3 ">Verify</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
