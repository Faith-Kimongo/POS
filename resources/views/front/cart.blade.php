@extends('layouts.front')

@section('content')
	
			<!-- cart -->
	<div class="cart segments-page">
		<div class="container">
			@if($carts->where('status',NULL)->count()>0)
			@foreach($carts->where('status',NULL) as $cart)
			<div style="border-radius: 45px;box-shadow: rgb(193, 193, 199);background-color: rgb(234 234 234); margin-top: 20px;padding: 20px "   class="content mt-5">
			<div class="cart-product">
				<div class="row">
					<div class="col s4" >
						<div class="content" >
							@if($cart->product->images->count()==0)
							<img src="{{ asset('media') }}/icon/food.jpg" onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'"style="height: 100px;" alt="">
							@else
							@foreach($cart->product->images as $image)
							@if ($loop->first)
							<img src="{{ asset('media') }}/products/{{$image->name}}"  onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'"style="height: 100px" alt="" alt="{{$image->name}}">
								@endif
							
							@endforeach
							@endif
						</div>
					</div>
					<div class="col s6">
						<div class="content">
							<a href="">{{$cart->product->name}}</a>
						</div>
					</div>
					<div class="col s2">
						<div class="content remove">
							<a href=""><i class="far fa-trash-alt"></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s4">
						<div class="content">
							<p>Price</p>
						</div>
					</div>
					<div class="col s8">
						<div class="content">
							<h5 class="price">KSh. {{number_format($cart->product->cost,2)}}</h5>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s4">
						<div class="content">
							<p>Quantity</p>
						</div>
					</div>
					<div class="col s6">
						<div class="content">
							<input type="number" value="{{($cart->quantity)}}">
						</div>
					</div>
				</div>
			</div>
			</div>
			@endforeach
			<div class="total-pay">
				<div class="row">
					
					<div class="col s8">
						<div class="content">
							<span>Total</span>
						</div>
					</div>
					<div class="col s4">
						<div class="content right">
							<span class="tot"> <u>KSh. {{number_format( $carts->where('status',NULL)->sum('amount'),2)}} </u></span>
						</div>
					</div>
				</div>
				<a href="/confirm" ><button class="button"><i class="fa fa-send"></i>Confirm</button> </a>
			</div>
			@else 
			Nothing in your cart
			@endif
		</div>
	</div>
	<!-- end cart -->
@endsection
