@extends('layouts.management')

@section('content')
    <!-- product -->
    <br>
    <br>    <br>
    <br>
    <br>
    <div class="product product-home segments mt-lg-3">
		<div class="container">
			<div class="section-title">
			<h3>Branches  </h3>
            </div>
        </div>
	</div>
	<!-- features -->
	<div class="features segments">
		<div class="container">
			<div class="row">
				@foreach(Auth::user()->branches as $branch)
				<div class="col s4">
				<a href="/management/set/branch/{{$branch->id}}">
					<div class="content">
						<i class="fas fa-map-marker"> </i>
						<span>{{$branch->name}}</span>
						<span>{{$branch->phone}}</span>
					</div>
					</a>
				</div>
				@endforeach
				
			</div>
		
		</div>
	</div>
	<!-- end features -->



	<div class="product product-home segments mt-lg-3">
		<div class="container">
			<div class="section-title">
				<h3>Shortcuts</h3>
            </div>
        </div>
	</div>


	<div class="features segments">
		<div class="container">
			<div class="row">
				<div class="col s4">
					<a href="/management/products">
					<div class="content">
						<i class="fab fa-product-hunt"></i>
						<span>Products</span>
					</div>
					</a>
				</div>
				<div class="col s4">
					<a href="/management/tables">
					<div class="content">
						<i class="fas fa-table"></i>
						<span>Tables</span>
					</div>
					</a>
				</div>
				<div class="col s4">
					<a href="/management/waiters">
					<div class="content">
						<i class="fas fa-users"></i>
						<span>Waiters</span>
					</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col s4">
					<a href="/management/orders">
					<div class="content">
						<i class="fas fa-shopping-cart"></i>
						<span>Orders</span>
					</div>
					</a>
				</div>
				<div class="col s4">
					<div class="content">
						<i class="fas fa-globe"></i>
						<span>Offers</span>
					</div>
				</div>
				<div class="col s4">
					<div class="content">
						<i class="fas fa-phone"></i>
						<span>Tickets</span>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
