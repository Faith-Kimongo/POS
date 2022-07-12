@extends('layouts.admin')

@section('content')
<br>
<br>    <br>
<br>
<br>
	<!-- register -->
	<div class="register segments-page">
		<div class="container">
			<div class="wrap-form">
				<form action="/admin/hotels" method="POST" >
					@csrf
					<input type="text" name="name" required placeholder="Name">
					<input type="text" name="location" id="location" placeholder="Location">
					<input type="text" name="phone" placeholder="Mobile Phone">
					<input type="email" name="email" placeholder="Email">
					<input type="password" name="password" placeholder="Password">
					<input type="password" name="confirm-password" placeholder="Retype Password">
					<select name="court" class="browser-default select-type">
						<option value="" disabled selected>Food Court</option>
						@foreach($courts as $court)
					    <option value="{{$court->id}}">{{$court->name}}</option>
					   @endforeach
					</select>
					{{-- <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}
					<button type="submit" class="button">Register</button>
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
