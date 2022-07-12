@extends('layouts.store')

@section('content')
    <!-- product -->
    <br>
    <br>    <br>
    <br>
    <br>
    <div class="product product-home segments mt-lg-3">
		<div class="container">
			<div class="section-title">
				<h3>Table summaries</h3>
            </div>
        </div>
	</div>
    {{-- <h5> </h5> --}}
	<!-- pricing table -->
	<div class="pricing segments-page">
		<div class="container">
			<div class="row">
                @foreach(Auth::user()->hotel->tables->where('branch_id',Auth::user()->branch_id) as $table)
				<div class="col s6" style="margin-bottom: 20px">
					<div class="wrap-content" >
						<div class="c-price">
							<img src="https://chart.apis.google.com/chart?cht=qr&chs=200x200&chl={{ url('/restaurant/' .Auth::user()->branch_id.'/'. Auth::user()->added_by. '/'.$table->id) }}&chld=H|0" alt="">
							{{-- <div class="mask"></div> --}}
                        {{-- <span>{{$table->number}}</span> --}}
						</div>
						<div class="content">
							<div class="c-title">
								<h5>{{$table->name}} ({{$table->number}})</h5>
							</div>
							<div class="c-desc" style="color: black">
								<ul>
                                    <li>Pending Orders : {{$table->orders->where('status',1)->count()}}</li>
                                    <li>Received Orders : {{$table->orders->where('status',2)->count()}}</li>
                                    <li>Ready Orders : {{$table->orders->where('status',3)->count()}}</li>
                                    <li>Closed Orders : {{$table->orders->where('status',4)->count()}}</li>
								</ul>
							</div>
							<a href="/hotel/orders">
							<div class="c-button">
								 <button class="button">Check Orders</button> 
							</div>
							</a>
						</div>
					</div>
                </div>
                @endforeach
				{{-- <div class="col s6">
					<div class="wrap-content">
						<div class="c-price">
							<img src="images/bg-pricing2.jpg" alt="">
							<div class="mask"></div>
							<span>$40</span>
						</div>
						<div class="content">
							<div class="c-title">
								<h5>Medium</h5>
							</div>
							<div class="c-desc">
								<ul>
									<li>Haircuts</li>
									<li>Coloring</li>
									<li>Manicures</li>
									<li>-</li>
								</ul>
							</div>
							<div class="c-button">
								<button class="button">BOOK NOW</button>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
	<!-- end pricing table -->

@endsection
