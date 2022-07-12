@extends('layouts.management')

@section('content')
<br>
<br>
<br>
<br>
	<!-- register -->
	<div class="register segments-page">
        <div class="product product-home segments">
            <div class="container">
                <div class="section-title">
                    <h3>New Category</h3>
                </div>
            </div>
        </div>
		<div class="container">
			<div class="wrap-form">
				<form action="/management/categories" method="POST" >
					@csrf
					<input type="text" name="name" required placeholder="Category name e.g Lunch, Dinner,...">
					
					<textarea cols="30" name= "description" rows="10" placeholder="Description"></textarea>
					
					<button type="submit" class="button">Save</button>
				</form>
				{{-- <div class="wrap-social">
					<h5>Register with</h5>
					<ul>
						<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
						<li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-google"></i></a></li>
					</ul>
				</div> --}}
			</div>
		</div>
	</div>
	<!-- end register -->

@endsection
