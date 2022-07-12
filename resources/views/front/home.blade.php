@extends('layouts.front')

@section('content')
	
	<!-- slider -->
    <div class="slide">
    	<div class="slide-show owl-carousel owl-theme">
    		<div class="content">
    			<div class="mask"></div>
    			<img src="{{ asset('media') }}/images/{{$hotel->hotel->options->where('option','logo')->last()->value}}" alt="">
    			 <div class="caption">
                    <h2>Welcome to <span>{{$hotel->name}}</span></h2>
                    <p>{{$hotel->hotel->options->where('option','tag')->first()->value}}</p>
                </div>
    		</div>
    		{{-- <div class="content">
    			<div class="mask"></div>
    			<img src="{{ asset('media') }}/images/chicken.jpg" alt="">
    			 <div class="caption">
                    <h2>Fried Chicken</h2>
                    <p>Best in this Category</p>
                </div>
    		</div> --}}
    		{{-- <div class="content">
    			<div class="mask"></div>
    			<img src="{{ asset('media') }}/images/coffee.jpg" alt="">
    			 <div class="caption">
                    <h2>Capucino</h2>
                    <p>Fresh Beans</p>
                </div>
    		</div> --}}
    	</div>
    </div>
    <!-- end slider -->
	<!-- product -->
	{{-- <div class="product product-home segments">
		<div class="container section-title mt-6">
			<div class="section-title mt-6"  style="margin-top: 10px">
				<h3>Our Menu</h3>
				
			</div>
			@foreach($hotel->categories as $category)
			<div class="section-title mt-6"  style="margin-top: 10px">
			<h3>{{$category->name}}</h3>
				
			</div>
			@foreach($category->subcategories as $subcategory)
			<div class="section-title mt-6"  style="margin-top: 10px">
				<h4>{{$subcategory->name}}</h4>
					
				</div>
			<div class="row">
				@foreach( $subcategory->products as $product)
				<div class="col s6">
					<div class="content" style="margin-top: 20px">
						<a href="/food/{{$product->name}}/{{$product->id}}">
							<div class="wrap-content">
								<div class="product-d-slide owl-carousel owl-theme">
									@foreach($product->images as $image)
									<div class="content" style="height: 200px">
										<img src="{{ asset('media') }}/products/{{$image->name}}" style="height: 200px" alt="">
									</div>
									@endforeach
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

		</div>
	</div> --}}

	<div class="features segments" style="margin-top: 0px">
		<div class="container" >
			<div class="row">
				@foreach($hotel->categories as $category)
			<a href="/category/{{$category->id}}">
				
				<div class="col s4" style="color: white" >
					<div class="content" style="background-image: url(../../../images/table.jpeg); height:100px" >
						{{-- <i class="fas fa-wifi"></i> --}}
					<h3 style="color: white">{{ucfirst($category->name)}}</h3> <br> <span>{{ucfirst($category->description)}}</span>
					</div>
				</div>
			</a>
				@endforeach

			</div>
			
		</div>
	</div>
	<!-- end product -->
@endsection
