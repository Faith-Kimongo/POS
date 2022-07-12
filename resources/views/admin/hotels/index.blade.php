@extends('layouts.admin')

@section('content')
<br>
<br>    <br>
<br>
<br>
	<!-- pricing table -->
	<div class="pricing segments-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					@if(session()->get('success'))
					  <div class="alert alert-success">
						{{ session()->get('success') }}  
					  </div>
					@endif
				  </div>
				  @foreach ($hotels as $hotel)
				  <div class="col s6 mb-5 mt-3">
					<div class="wrap-content">
						<div class="c-price">
							<img src="images/bg-pricing1.jpg" alt="">
							<div class="mask"></div>
							<span>$20</span>
						</div>
						<div class="content mb-3">
							<div class="c-title">
								<h5>{{$hotel->name}}</h5>
							</div>
							<div class="c-desc">
								<ul>
									<li>{{$hotel->location}}</li>
									<li>{{$hotel->phone}}</li>
								<li>Placed Orders : {{$hotel->orders->count()}}</li>
									<li>-</li>
								</ul>
							</div>
							<div class="c-button">
								<button class="button">BILL</button>
							</div>
						</div>
					</div>
					<br><br>
				</div> 
				  @endforeach


			</div>

		</div>
	</div>
	<!-- end pricing table -->
@endsection
