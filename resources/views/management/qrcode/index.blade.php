@extends('layouts.management')

@section('content')
   
    <!-- product -->
	<div class="product segments-page">
        <div class="product product-home segments">
            <div class="container">
                <div class="section-title">
                    <h3>Tables</h3>
                </div>
            </div>
        </div>
		<div class="container">
			<div class="row">
                @foreach(Auth::user()->tables as $table)
				<div class="col s6 ">
					<div class="content center-align">
						{{-- <a href="product-details.html"> --}}
							<p><img src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl={{ url('/restaurant/'. Auth::id().'/'.$table->id) }}&chld=H|0" alt="" style="height: 260px; width:260px;" class="center"></p>
							<p>{{$table->name}}</p>
						{{-- </a> --}}
                    <h5>{{$table->number}}</h5>
					</div>
                </div>
                @endforeach
			</div>
			
			<div class="pagination pagination-circle">
				
			</div>
		</div>
	</div>
	<!-- end product -->

@endsection
