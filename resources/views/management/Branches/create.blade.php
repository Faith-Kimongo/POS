@extends('layouts.management')

@section('content')
<br>
<br>    <br>
<br>
<br>
	<!-- register -->
	<div class="register segments-page">
        <div class="product product-home segments">
            <div class="container">
                <div class="section-title">
                    <h3>New {{Auth::user()->name}} Branch</h3>
                </div>
            </div>
        </div>
		<div class="container">
			<div class="wrap-form">
				<form action="/management/branches" method="POST" >
					@csrf
					<input type="text" name="name" required placeholder="Branch Name">
					<input type="text" name="location" id="location" placeholder="Location">
					<input type="email" name="email" placeholder="Branch Email">
					<input type="text" name="phone" placeholder="Branch Mobile Phone">
					
					<button type="submit" class="button">Save</button>
				</form>
				
			</div>
		</div>
	</div>
	<!-- end register -->

@endsection
