@extends('layouts.management')

@section('content')
    <!-- product -->
    <br>
    <br>    <br>
    <br>
	<br>
	<br>
    <br>
    <div class="product product-home segments mt-lg-3">
		<div class="container">
			<div class="section-title">
				<h3>{{Auth::user()->name}} Staff</h3>
            </div>
        </div>
	</div>
	<!-- features -->
	<div class="features segments">
		<div class="container">
			<div class="row">
				@foreach ($waiters as $waiter)
					
				
				<div class="col s4" style="margin-top:2%">
					<div class="content" >
						
						<i class="fas fa-user"> </i>
						<span>{{$waiter->name}}</span>
						<span>{{$waiter->phone}}</span>
					</div>
				</div>
				
				@endforeach
			</div>

		</div>
	</div>
	<!-- end features -->

@endsection
