@extends('layouts.front')

@section('content')


			<!-- cart -->
	<div class="cart segments-page">

		<div class="container">
			<div class="section-title mt-6 ml-5 pl-5"  style="margin-top: 10px">
				<h4> <a href="/restaurant/{{Session::get('branch')}}/{{Session::get('hotel_id')}}/{{Session::get('table_no')}}">Home </a>  >>  My Orders</h4>
					
			</div>

			@if (session('status'))
			<div class="alert alert-success" style="background-color: seagreen" role="alert">
				{{ session('status') }}
			</div>
			@endif
			@if($carts->count()>0)
			
			@foreach($carts->where('status','<>',NULL) as $cart)
			<div style="border-radius: 45px;box-shadow: rgb(193, 193, 199);background-color: rgb(234 234 234); margin-top: 20px;padding: 20px "   class="content mt-5">
			<div class="cart-product">
				<div class="row">
					<div class="col s4">
						<div class="content">
							@if($cart->product->images->count()==0)
							<img src="{{ asset('media') }}/icon/food.jpg" onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'"style="height: 100px" alt="">
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
						<div class="content">
							<a href="#"> Table: <strong>{{$cart->table->number}}</strong></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s4">
						<div class="content">
							<p>Status</p>
						</div>
					</div>
					<div class="col s8">
						<div class="content">
                            @if($cart->status==1)
                            <button class="button btn-round"   style="background: yellow;border-radius: 45px; color: rgb(2, 2, 2);"  ><i class="fa fa-send"></i>Placed</button>
                            @elseif($cart->status==2)
                            <button class="button" style="background:orange;border-radius: 45px"><i class="fa fa-send"></i>Preparing</button>
                            @elseif($cart->status==3)
                            <button class="button" style="background:blue;border-radius: 45px"><i class="fa fa-send"></i>Ready</button>
                            @elseif($cart->status==4)
                            <button class="button" style="background: green;border-radius: 45px"><i class="fa fa-send"></i>Served</button>
                            @elseif($cart->status==5)
                            <button class="button" style="background: rgb(235, 21, 5);border-radius: 45px"><i class="fa fa-send"></i>Unavailable</button>
                            @endif
							{{-- <h5 class="price">KSh. {{$cart->product->cost}}</h5> --}}
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 0px">
					<div class="col s4">
						<div class="content">
							<p>Quantity</p>
						</div>
					</div>
					<div class="col s6">
						<div class="content">
							<input readonly type="number" value="{{($cart->quantity)}}">
						</div>
					</div>
                </div>
                <div class="row" style="margin-top: 0px">
					<div class="col s4">
						<div class="content">
							<p>Placed At</p>
						</div>
					</div>
					<div class="col s6">
						<div class="content">
                            {{$cart->created_at}}
							{{-- <input readonly type="number" value="{{$cart->created_at}}"> --}}
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col s4">
						<div class="content">
							<p>ETA</p>
						</div>
					</div>
					<div class="col s6">
						<div class="content">
                            {{$cart->product->preparation}} Mins
						</div>
					</div>
				</div>
				@if($hotel->hotel->payment==NULL)
				<div class="row">
					<div class="col s4">
						<div class="content">
							<p>Payment Status</p>
						</div>
					</div>
					<div class="col s6">
						<div class="content">
							@if($cart->paid==NULL)
							<button class="button col-6" style="width:auto">Not Paid</button>
							@else
							<button class="button col-6" style="background-color: green">PAID</button> 
							@endif

						</div>
					</div>
				 </div>
				 @endif
				
			</div>
			</div>
			@endforeach
			<div class="total-pay">
				<div class="row">

					<div class="col s12">
						<div class="content">
							<p>Check status using the button below</p>
						</div>
					</div>

				</div>

			</div>

@if($hotel->hotel->options->where('option','ilo')->first()->value !=NULL)
			<div class="total-pay">
				<div class="row">

					<div class="col s12">
						<div class="content align-content-center">
							<img src="{{ asset('media') }}/icon/ilo.png" onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'"style="height: 100px" alt="">
							<p>Register on <a href="https://dev.ilogroup.co.ke/" style="color: red"  class=" font-weight-bolder">ILO </a> to earn {{$hotel->name}}'s loyalty Points</p>
						</div>
					</div>

				</div>

			</div>
			@endif
			<div class="cart-product">
			<div class="row" style="padding:50px"  >
				
				<a href="/orders" ><button class="button col-6" style="width:auto"><i class="fa fa-send"></i>Check Status</button> </a>
				
				@if($hotel->payment==1)
				<a href="#payment" class="modal-trigger"> <button class="button col-6" style="width:auto">Make Payment</button></a>
				@endif
				</div>
			</div>
			 
			@else
			You have no orders
			@endif
		</div>
	</div>
	<!-- end cart -->


	@if($hotel->payment==1)
	<script type="text/javascript">
		//initialize all modals
$('.modal').modal({
    dismissible: true
});
		$('#ilonote').modal('open');
	</script>
	@else
	     
	@endif



	<div class="modal-notify">
		<div id="payment" class="modal modal6">
			<div class="modal-content">
				{{-- <form action="stk/push" method="POST"> --}}
					<form action="/mpesa/payment" method="POST">	
					@csrf
				<input type="text" readonly name="amount" value="{{ $carts->where('status',1)->where('paid',NULL)->sum('amount')}}" placeholder="KSh. {{number_format( $carts->where('status',1)->sum('amount'),2)}} ">
					{{-- <input type="email" placeholder="Email"> --}}
					<input type="text" name="phone" required placeholder="Phone Number">
					{{-- <label for="myCheck">Checkbox:</label>  --}}
					{{-- <input type="checkbox" class="form-check-input" id="myCheck" onclick="myFunction()"> --}}
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="remember" id="remember" onclick="myFunction()">

						<label class="form-check-label" for="remember">
							{{ __('Registered with ILO?') }}
						</label>
					</div>

					{{-- <p id="text" style="display:none">Checkbox is CHECKED!</p> --}}
					<input type="text" id="text" style="display:none" name="ilo"  placeholder=" Enter Your ILO Account">


					<button class="button">Pay</button>
				</form>
			</div>
		</div>
	</div>

{{-- ILO registration --}}

<div class="modal-notify">
	<div id="ilonote" class="modal show  modal6">
		<div class="modal-content">
			fhgjfhgjfhgjh
		</div>
	</div>
</div>

{{-- ILo Registration --}}
	<script>
		function myFunction() {
		  var checkBox = document.getElementById("remember");
		  var text = document.getElementById("text");
		  if (checkBox.checked == true){
			text.style.display = "block";
			text.attr.required = "true";
		  } else {
			 text.style.display = "none";
		  }
		}
		</script>
@endsection
