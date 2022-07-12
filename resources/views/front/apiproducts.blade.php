@extends('layouts.front')

@section('content')
	<!-- product -->
	<div class="product product-home segments">
		<div class="container section-title mt-6">
            <br>
<br>    <br>
<br>
<br>

			<div class="section-title mt-6"  style="margin-top: 10px">
			
			</div>

			<div class="section-title mt-6"  style="margin-top: 10px">
				<h4> <a href="/restaurant/{{Session::get('branch')}}/{{Session::get('hotel_id')}}/{{Session::get('table_no')}}">Home </a>>> Products</h4>
					
				</div>
			<div class="row">
				@foreach( $products as $product)
				<div class="col s6" >
					<div class="content">
						<a href="/food/{{$product->name}}/{{$product->id}}">
							<div class="wrap-content">
								<div class="product-d-slide owl-carousel owl-theme">
                                    @if($product->images->count()==0)
                                    <div class="content" style="height: 100px">
                                       
                                        {{-- <img src="{{ asset('media') }}/products/{{$image->name}}" onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'"style="height: 100px" alt=""> --}}
                                        <img src="{{ asset('media') }}/icon/table.jpeg" onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'"style="height: 100px" alt="">
                                    </div>
                                    @else
                                    @foreach($product->images as $image)
                                    <div class="content" style="height: 100px">
                                       
                                        <img src="{{ asset('media') }}/products/{{$image->name}}" onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'"style="height: 100px" alt="">
                                        {{-- <img src="{{ asset('media') }}/icon/table.jpeg" onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'"style="height: 100px" alt=""> --}}
									</div>
                                    @endforeach
                                    @endif
								</div>
								</div>
							<p>{{$product->name}}</p>
							{{-- <span>{{$product->description}}</span> --}}
						</a>
						<h5>KSh.{{number_format( $product->cost,2)}}</h5>
					</div>
				</div>
				@endforeach
			</div>
			{{-- @endforeach --}}
			{{-- @endforeach --}}

		</div>
	</div>


	<!-- end product -->
@endsection
