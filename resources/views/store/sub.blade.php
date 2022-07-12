@extends('layouts.store')

@section('content')
<br>
<br>    <br>
<br>
<br>
<div class="product product-home segments mt-lg-3">
    <div class="container">
        <div class="section-title">
        <h3> Home >> Products Categories</h3>
        </div>
    </div>
</div>
<div class="features segments" style="margin-top: 0px">
    <div class="container" >
        <div class="row">
            @foreach($category->subcategories as $sub)
        <a href="/hotel/sub/products/{{$sub->id}}">
            <div class="col s4" style="color: white">
                <div class="content" style="background-image: url(../../../images/table.jpeg); height:100px"  >
                    {{-- <i class="fas fa-wifi"></i> --}}
                    <h3 style="color: white">{{ucfirst($sub->name)}}</h3><span>{{ucfirst($sub->description)}}</span>
                </div>
            </div>
        </a>
            @endforeach

        </div>
        
    </div>
</div>
@endsection
