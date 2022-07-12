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
                <h3>New Product</h3>
                </div>
            </div>
        </div>
		<div class="container">
			<div class="wrap-form">
				<form action="/management/products" method="POST" enctype="multipart/form-data">
                    @csrf
					<input type="text" name="sub_category" hidden value="{{$subcategory->id}}" placeholder="Spaces"> 
					<input type="text" name="number" readonly placeholder="{{$subcategory->name}}">
					<input type="text" name="name" required placeholder="Name">
					<input type="number" name="cost" id="cost" required placeholder="Cost">
					<textarea cols="30" name= "description" rows="10" placeholder="Description"></textarea>
					<input type="text" name="preparation" placeholder="Preparation time (Mins)"> 
					{{-- <input type="file" name="cost" id="cost" required placeholder="Images"> --}}

					<input type="file" class="form-control" name="photos[]" multiple />

					<button type="submit" class="button">Save</button>
				</form>
				
            </div>
            
		</div>
	</div>
	<!-- end register -->

@endsection
