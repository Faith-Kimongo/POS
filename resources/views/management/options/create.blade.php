@extends('layouts.management')

@section('content')

	<!-- register -->
	<div class="register segments-page">
        <div class="product product-home segments">
            <div class="container">
                <div class="section-title">
                    <h3>Restaurant Customization</h3>
                </div>
            </div>
        </div>
		<div class="container">
			<div class="wrap-form">
				<form action="/management/options" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="info" style="margin-top: 20px">
						<ul>
							<li>Your Moto / Tag line
								{{-- <a href="login.html">Login</a> --}}
							</li>
						</ul>
					</div>
					<input type="text" name="tag" id="tag" placeholder="Tag Line">
					<div class="info" style="margin-top: 20px">
						<ul>
							<li>Your Theme/Brand Color
								{{-- <a href="login.html">Login</a> --}}
							</li>
						</ul>
					</div>
					<input type="color" name="color" placeholder="Theme Color">
					
					<div class="info" style="margin-top: 20px">
						<ul>
							<li>Your Logo
								{{-- <a href="login.html">Login</a> --}}
							</li>
						</ul>
					</div>
					<input type="file" name="logo" required placeholder="Logo">




					<div class="info" style="margin-top: 20px">
						<ul>
							<li>ILO Loyalty ID
								{{-- <a href="login.html">Login</a> --}}
							</li>
						</ul>
					</div>
					<input type="text" name="ilo" id="ilo" placeholder="Your ILO ID">
					<button type="submit" class="button">Save</button>
				</form>
				
			</div>
		</div>
	</div>
	<!-- end register -->

@endsection
