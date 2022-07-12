@extends('layouts.admin')

@section('content')

	<!-- register -->
	<div class="register segments-page">
		<div class="container">
			<div class="wrap-form">
				<form>
					<input type="text" placeholder="Name">
					<input type="text" placeholder="Location">
					{{-- <input type="text" placeholder="Username"> --}}
					<input type="email" placeholder="Email">
					<input type="password" placeholder="Password">
					<input type="password" placeholder="Retype Password">
					{{-- <div class="info">
						<ul>
							<li>Have an account?
								<a href="login.html">Login</a>
							</li>
						</ul>
					</div> --}}
					<button class="button">Register</button>
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
