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
				<h3>Shortcuts</h3>
            </div>
        </div>
	</div>
	<!-- features -->
	<div class="features segments">
		<div class="container">
			<div class="row">
				<a href="/hotel/categories">
				<div class="col s4">
					<div class="content">
						<i class="fa fa-product-hunt" aria-hidden="true"></i>
						<span>Products</span>
					</div>
				</div>
				</a>
				<a href="/hotel/tables" >
				<div class="col s4">
					<div class="content">
						<i class="fas fa-table"></i>
						<span>Tables</span>
					</div>
				</div>
				</a>
				{{-- <div class="col s4">
					<div class="content">
						<i class="fas fa-gift"></i>
						<span>Waiters</span>
					</div>
				</div> --}}
			</div>
			<div class="row">
				<a href="/hotel/orders/pending">
				<div class="col s4">
					<div class="content">
						<i class="fas fa-shopping-cart"></i>
						<span>Orders</span>
					</div>
				</div>
				</a>
				<div class="col s4">
					<div class="content">
						<i class="fas fa-globe"></i>
						<span>Offers</span>
					</div>
				</div>
				{{-- <div class="col s4">
					<div class="content">
						<i class="fas fa-phone"></i>
						<span>Tickets</span>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
	<!-- end features -->

@endsection
