<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="{{ asset('media/icon/logo.png') }}">
	<title>Smart Waiter Admin</title>

	<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
	<link rel="stylesheet" href="{{ asset('css/loaders.css') }}">
	<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

	<!-- preloader -->
	<div class="preloader">
		<div class="spinner"></div>
	</div>
	<!-- end preloader -->
	
	<!-- navbar -->
	<div class="navbar navbar-home">
		<div class="container">
			<div class="row">
				<div class="col s3">
					<div class="content-left">
						<a href="#slide-out" data-activates="slide-out" class="sidebar"><i class="fas fa-bars"></i></a>
					</div>
				</div>
				<div class="col s6">
					<div class="content-center">
						<a href="index.html"><h1>Smart Waiter Admin</h1></a>
					</div>
				</div>
				<div class="col s3">
					<div class="content-right">
						<div class="content-search">
							<a href="#slide-out-right" data-activates="slide-out-right" class="sidebar-right-search">
								<i class="fas fa-search"></i>
							</a>
						</div>
						<div class="content-cart">
							<a href="#slide-out-cart" data-activates="slide-out-cart" class="sidebar-right-cart">
	                            <i class="fas fa-shopping-cart"><sup>3</sup></i>
	                        </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end navbar -->

	<!-- sidebar left -->
	<div class="sidebar-panel">
		<ul id="slide-out" class="collapsible side-nav">
			<li class="list-top">
                <div class="user-view">
                    <div class="image">
                    	<img src="{{ asset('media/icon/logo.png') }} " alt="">
                    </div>
                    <h3>Smart Waiter Admin</h3>
                    <span>Zero Contact Menu</span>
                </div>
            </li>
			<li><a href="/Dashboard">Home</a></li>
			<li>
	         	<div class="collapsible-header">
	         		Restaurants<span><i class="fas fa-angle-right right"></i></span>
	         	</div>
	            <div class="collapsible-body">
	              <ul>
					<li><a href="/admin/hotels">List</a></li>
	                <li><a href="/admin/hotels/create">New</a></li>
	                               
	              </ul>
	            </div>
			</li>
			<li>
				<div class="collapsible-header">
					Food Courts<span><i class="fas fa-angle-right right"></i></span>
				</div>
			   <div class="collapsible-body">
				 <ul>
				   <li><a href="/admin/court">List</a></li>
				   {{-- <li><a href="/admin/hotels/create">New</a></li> --}}
								  
				 </ul>
			   </div>
		   </li>

		   <li>
			<div class="collapsible-header">
				Tables<span><i class="fas fa-angle-right right"></i></span>
			</div>
		   <div class="collapsible-body">
			 <ul>
			   <li><a href="/admin/table">List</a></li>
			   {{-- <li><a href="/admin/hotels/create">New</a></li> --}}
							  
			 </ul>
		   </div>
	   </li>

			<li><a href="contact.html">Contact Information</a></li>
			<li><a href="/profile">{{Auth::user()->name}}</a></li>
			<li><a href="#" onclick="event.preventDefault();
				document.getElementById('logout-form').submit(); ">Log Out</a></li>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
			
		</ul>
	</div>
	<!-- end sidebar left -->
	
	<!-- sidebar search -->
	<div class="sidebar-panel sidebar-search">
		<ul id="slide-out-right" class="collapsible side-nav">
			<li>
				<div class="form">
					<input type="search"><button class="button"><i class="fas fa-search"></i></button>
				</div>
				<div class="clear"></div>
			</li>
			<li><h5>Popular Search</h5></li>
			<li><a href="">Juice</a></li>
			<li><a href="">Coffea</a></li>
			<li><a href="">Chicken</a></li>
			<li><a href="">Fried</a></li>
			<li><a href="">Stick</a></li>
			<li><a href="">Food</a></li>
			<li><a href="">Meat</a></li>
		</ul>
	</div>
	<!-- end sidebar search -->

	<!-- sidebar cart -->
    <div class="sidebar-panel sidebar-cart">
        <div id="slide-out-cart" class="collapsible side-nav">
            <div class="content">
                <div class="cart-img">
                    <img src="{{ asset('media') }}/images/coffee.jpg" alt="">
                </div>
                <div class="cart-title">
                    <a href="">Healthy vegetables are full</a>
                    <h5>$18</h5>
                </div>
                <div class="cart-remove">
                    <a href=""><i class="fas fa-trash-alt"></i></a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="content">
                <div class="cart-img">
                    <img src="{{ asset('media') }}/images/coffee.jpg" alt="">
                </div>
                <div class="cart-title">
                    <a href="">Delicious thick noodles</a>
                    <h5>$28</h5>
                </div>
                <div class="cart-remove">
                    <a href=""><i class="fas fa-trash-alt"></i></a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="content">
                <div class="cart-img">
                    <img src="{{ asset('media') }}/images/coffee.jpg" alt="">
                </div>
                <div class="cart-title">
                    <a href="">Special chicken meat sauce</a>
                    <h5>$32</h5>
                </div>
                <div class="cart-remove">
                    <a href=""><i class="fas fa-trash-alt"></i></a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="cart-button">
                <ul>
                    <li>
                        <button class="button">View Cart</button>
                    </li>
                    <li>
                        <button class="button">Checkout</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end sidebar cart -->

        <main class="py-4">
            @yield('content')
        </main>
    <!-- </div> -->
	<!-- footer -->
	<footer>
		<div class="container">
			<div class="wrap-logo">
				<h3><img src="{{ asset('media/icon/logo.png') }}" alt="">Smart Waiter Admin</h3>
			</div>
			<div class="wrap-info">
				<ul>
					<li>Tribus-Tsg , Two Rivers Mall</li>
					<li>+1 23 456 789</li>
					<li>info@smartwaiter.co.ke</li>
				</ul>
			</div>
			<div class="wrap-social">
				<ul>
					<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
					<li><a href=""><i class="fab fa-instagram"></i></a></li>
					<li><a href=""><i class="fab fa-google"></i></a></li>
					<li><a href=""><i class="fab fa-youtube"></i></a></li>
				</ul>
			</div>
			<div class="footer-text">
				<p>Copyright © All Right Reserved</p>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/materialize.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
