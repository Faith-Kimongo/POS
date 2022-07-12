@extends('layouts.management')

@section('content')
	 <!-- product details -->
	 <br>
	 <br>
	 <br>
	 <br>
     <div class="product-details segments-page">
		<div class="container">
			<div class="wrap-content">
				<div class="desc-short">
					<h4>{{$category->name}}</h4>
					{{-- <h5>$28</h5> --}}
                <p>{{$category->description}}</p>
					
				</div>
			</div>
			<div class="wrap-info">
				<div class="row">
					<div class="col s12">
						<ul class="tabs">
							<li class="tab col s3"><a class="active" href="#tabs1">Sub Categories</a></li>
							{{-- <li class="tab col s3"><a href="#tabs2">Reviews</a></li> --}}
						</ul>
					</div>
					<div id="tabs2" class="col s12">
						<div class="content-tabs">
							<div class="comment-people">
                                @foreach($category->subcategories as $subcategory)
								<div class="content no-pt">

									<div class="text">
										<h5>{{$subcategory->name}}</h5>
										{{-- <ul>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
										</ul> --}}
										<p>{{$subcategory->description}}</p>
									<p class="date">{{$subcategory->created_at}} <span> <a href="/management/products/add/{{$subcategory->id}}"> <i class="fas fa-plus"></i>Add Products </a></span><span><i class="fas fa-edit"></i>Edit</span></p>
									</div>
                                </div>
                                @endforeach
						

								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="comment-form">
				<div class="wrap-title">
					<h5>New Sub-Category</h5>
				</div>
                <form action="/management/subcategories" method="POST">
                    @csrf
					<input type="text"name="id" hidden value="{{$category->id}}" placeholder="">
					<input type="text" name="name" placeholder="Name">
					<textarea cols="30" name="description" rows="10" placeholder="description"></textarea>
					<button class="button" onclick="this.form.submit()">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<!-- end product details -->
@endsection
