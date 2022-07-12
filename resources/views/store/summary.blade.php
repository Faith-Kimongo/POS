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
				<h3>Today summary</h3>
            </div>
        </div>
	</div>
    {{-- <h5> </h5> --}}
	<!-- pricing table -->
	<div class="pricing segments-page">
		<div class="container">
			<div class="row">
                {{-- @foreach(Auth::user()->hotel->tables->where('branch_id',Auth::user()->branch_id) as $table) --}}
				<div class="col s12" style="margin-bottom: 20px">
					<div class="wrap-content" >
						<div class="c-price">
							{{-- <img src="https://chart.apis.google.com/chart?cht=qr&chs=200x200&chl={{ url('/restaurant/' .Auth::user()->branch_id.'/'. Auth::user()->added_by. '/'.$table->id) }}&chld=H|0" alt=""> --}}
							{{-- <div class="mask"></div> --}}
                        {{-- <span>{{$table->number}}</span> --}}
						</div>
						<div class="content">
							<div class="c-title">
								{{-- <h5>{{$table->name}} ({{$table->number}})</h5> --}}
							</div>
							<div class="c-desc" style="color: black">
								<ul>
                                    {{-- <li>Pending Orders : {{Auth::user()->states->where('state',2)->count()}}</li> --}}
                                    <li>Received Orders : {{Auth::user()->states->where('state',2)->count()}}</li>
                                    <li>Prepared Orders : {{Auth::user()->states->where('state',3)->count()}}</li>
                                    <li>Served Orders : {{Auth::user()->states->where('state',4)->count()}}</li>
									{{-- <li>Ready Orders : </li>
									<li>Closed Orders : 2</li> --}}
									{{-- <li>-</li> --}}
								</ul>
							</div>
							<a href="/hotel/orders">
							<div class="c-button">
								 {{-- <button class="button">Check Orders</button>  --}}
							</div>
							</a>
						</div>
					</div>
                </div>
                {{-- @endforeach --}}
				
			</div>
		</div>
	</div>
	<!-- end pricing table -->

@endsection
