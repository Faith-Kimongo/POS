@extends('layouts.store')

@section('content')
    <!-- product -->
    <br>
    <br>    <br>
    <br>
    <br>
 	
			<!-- cart -->
            <div class="cart segments-page">
                <div class="container">
                    @if($orders->count()==0)
                    No Pending Orders 
                    @else
                    @foreach($orders as $cart)
                    <form method="POST" action="/hotel/orders/update" >
                        @csrf
                        <input readonly hidden type="number" name="order" value="{{$cart->id}}">
                        <input readonly hidden type="number" name="state" value="{{$cart->status}}">
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
                            <div class="col s4">
                                <div class="content">
                                    <a href="#"><strong> Table: {{$cart->table->number}}</strong></a>
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
                                    <button class="button" style="background: red"><i class="fa fa-send"></i>Pending</button>
                                    @elseif($cart->status==2)
                                    <button class="button" style="background:orange"><i class="fa fa-send"></i>Recieved</button>
                                    @elseif($cart->status==3)
                                    <button class="button" style="background: blue"><i class="fa fa-send"></i>Ready</button>
                                    @elseif($cart->status==4)
                                    <button class="button" style="background: green"><i class="fa fa-send"></i>Served</button>
                                    @elseif($cart->status==5)
                                    <button class="button" style="background: rgb(235, 21, 5)"><i class="fa fa-send"></i>Unavailable</button>
                                    @endif
                                    {{-- <h5 class="price">KSh. {{$cart->product->cost}}</h5> --}}
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
                                   <strong> <input readonly  type="text" value="{{($cart->quantity)}}"></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                        <div class="row">
                            <div class="col s4">
                                <div class="content">
                                    <p>Action</p>
                                </div>
                            </div>
                            <div class="col s8">
                                <div class="content">
                                    @if($cart->status==1)
                                    <button class="button" style="background: red" onclick="this.form.submit()"><i class="fa fa-send"></i>Receive</button>
                                    @elseif($cart->status==2)
                                    <button class="button" style="background:orange" onclick="this.form.submit()"><i class="fa fa-send"></i>Ready</button>
                                    @elseif($cart->status==3)
                                    <button class="button" style="background: blue" onclick="this.form.submit()"><i class="fa fa-send"></i>Serve</button>
                                    @elseif($cart->status==4)
                                    <button class="button"  disabled style="background: green"><i class="fa fa-send"></i>Order Completed</button>
                                    @elseif($cart->status==5)
                                    {{-- <button class="button" style="background: rgb(235, 21, 5)"><i class="fa fa-send"></i>Unavailable</button> --}}
                                    @endif
                                    {{-- <h5 class="price">KSh. {{$cart->product->cost}}</h5> --}}
                                </div>
                            </div>
                        </div>

                        <br> <br>
                    </div>
                    </div>
                    </form>
                    @endforeach
                    @endif

                </div>
            </div>
            <!-- end cart -->

@endsection
