@extends('layouts.management')

@section('content')

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
				<form action="/management/tables" method="POST" >
                    @csrf
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
					<input type="text" name="name" required placeholder="Table name">
					<input type="text" name="location" id="location" placeholder="Location">
					{{-- <input type="text" name="number" placeholder="Table Number">
					<input type="text" name="spaces" placeholder="Spaces"> --}}
					
					<button type="submit" class="button">Save</button>
				</form>
				
			</div>
		</div>
	</div>
	<!-- end register -->

@endsection
