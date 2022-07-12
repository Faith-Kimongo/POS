@extends('layouts.management')

@section('content')
<br>
<br>    <br>
<br>
<br>
		<!-- product details -->
        <div class="product-details segments-page">
            <div class="container">
                <form method="POST" action="/client/cart" >
                    @csrf
                <div class="wrap-content">
                    <div class="product-d-slide owl-carousel owl-theme">
                        @if($product->images->count()==0)
                        <div class="content">
                        <img src="{{ asset('media') }}/icon/table.jpeg" onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'" alt="">
                        </div>
                        @else
                        @foreach($product->images as $image)
                        <div class="content">
                            <img src="{{ asset('media') }}/products/{{$image->name}}" alt="">
                        </div>
                        @endforeach
                        @endif


                    </div>
                    <div class="desc-short" style="margin-top: 20px">
                        <h4>{{ucfirst($product->name)}}</h4>
                        <p>{{ucfirst($product->description)}}</p>
                        <h5>KSh. {{ number_format($product->cost,2)}}</h5>
                        {{-- <input type="number" name="quantity" required placeholder="Quantity" value="1"> --}}
                        {{-- <input type="text" name="product" hidden required placeholder="product" value="{{$product->id}}"> --}}
                        {{-- <button class="button" onclick="this.form.submit()"><i class="fas fa-shopping-cart"></i> Add to Order</button> --}}
                    </div>
                </div>
                </form>
                </div>

            </div>
        </div>
        <!-- end product details -->
@endsection
