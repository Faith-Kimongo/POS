@extends('layouts.management')

@section('content')
    <!-- product -->
    <br>
    <br>    <br>
    {{-- <br>
    <br> --}}

	<!-- features -->
	<div class="product segments-page">
		<div class="product product-home segments mt-lg-3">
			<div class="container">
				<div class="section-title">
					<h3>Products</h3>
				</div>
			</div>
		</div>
		<div class="container">
			@foreach(Auth::user()->categories as $category)
			<div class="section-title mt-6"  style="margin-top: 10px">
				<h3>{{$category->name}}</h3>
					
				</div>
			@foreach($category->subcategories as $subcategory)
			<div class="section-title mt-6"  style="margin-top: 10px">
				<h4>{{$subcategory->name}}</h4>
					
				</div>
			<div class="row">
				@foreach($subcategory->products as $product)
				<div class="col s6" >
					<div class="content">
						<a href="/management/products/{{$product->id}}">
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
							<span>{{$product->description}}</span>
						</a>
						<h5>KSh.{{number_format( $product->cost,2)}}</h5>
					</div>
				</div>
				@endforeach

			</div>
			@endforeach
			@endforeach
			
			{{-- <div class="pagination pagination-circle">
				<ul>
					<li class="disabled"><a href="">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">4</a></li>
					<li><a href="">5</a></li>
				</ul>
			</div> --}}
		</div>
	</div>
	<!-- end product -->

@endsection
