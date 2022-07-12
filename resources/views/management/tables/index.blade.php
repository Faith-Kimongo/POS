@extends('layouts.management')

@section('content')
<br>
<br>
<br>
<br>
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
				<div class="col s6">
					<div class="content">
						<a href="#">
							{{-- <img src="{{ asset('media/icon/table.jpeg') }}" alt=""> --}}
							<img src="https://chart.apis.google.com/chart?cht=qr&chs=200x200&chl={{ url('/restaurant/' .$table->branch_id.'/'. Auth::user()->id. '/'.$table->id) }}&chld=H|0" alt="">

							<p>{{$table->name}}</p>
						</a>
					<h5>{{$table->number}}</h5>
					<div class="c-desc" style="color: black">
						<ul>
							<li>Pending Orders : {{$table->orders->where('status',1)->count()}}</li>
							<li>Received Orders : {{$table->orders->where('status',2)->count()}}</li>
							<li>Ready Orders : {{$table->orders->where('status',3)->count()}}</li>
							<li>Closed Orders : {{$table->orders->where('status',4)->count()}}</li>
						</ul>
					</div>
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
