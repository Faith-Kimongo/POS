@extends('layouts.management')

@section('content')
   
    <!-- product -->
	<div class="product segments-page">
        <div class="product product-home segments">
            <div class="container">
                <div class="section-title">
                    <h3>{{Auth::user()->name}} Branches</h3>
                </div>
            </div>
		</div>
		<div class="features segments">
			<div class="container">
		{{-- <div class="container"> --}}
			                    @if (session('status'))
								<div class="alert alert-success" role="alert">
									Branch added Successfully!!
								</div>
							@endif
			<div class="row">
                @foreach(Auth::user()->branches as $branch)
				<div class="col s4" style="margin-top:2%">
					<div class="content" >
						
						<i class="fas fa-map-marker"> </i>
						<span>{{$branch->name}}</span>
						<span>{{$branch->phone}}</span>
					</div>
				</div>
                @endforeach
			</div>
			
			<div class="pagination pagination-circle">
				
			</div>
		</div>
			</div>
	</div>
	<!-- end product -->

@endsection
