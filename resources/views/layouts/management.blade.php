<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="{{ asset('media/icon/logo.png') }}">
	<title>{{Auth::user()->name}}</title>

	<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
	<link rel="stylesheet" href="{{ asset('css/loaders.css') }}">
	<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	{{-- <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script> --}}
    {{-- <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css"> --}}
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  --}}

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
						@if(Session::get('branch')==NULL)
						<a href="#"><h1>{{Auth::user()->name}} Management <span> </span></h1></a>
						@else 
						<a href="#"><h1>{{Auth::user()->name}} Management </h1></a>
						@endif
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
	                            <i class="fas fa-bell"><sup>3</sup></i>
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
                    <h3><a href="/management">{{Auth::user()->name}} Management</a></h3>
                    <span>Zero Contact Menu</span>
                </div>
            </li>
			<li><a href="/management">Home</a></li>
			<li>
				<div class="collapsible-header">
					Branches<span><i class="fas fa-angle-right right"></i></span>
				</div>
			   <div class="collapsible-body">
				 <ul>
				   <li><a href="/management/branches">List</a></li>
				   <li><a href="/management/branches/create">New</a></li>
								  
				 </ul>
			   </div>
		   </li>
			<li>
	         	<div class="collapsible-header">
	         		Staff<span><i class="fas fa-angle-right right"></i></span>
	         	</div>
	            <div class="collapsible-body">
	              <ul>
					<li><a href="/management/waiters">List</a></li>
	                <li><a href="/management/waiters/create">New</a></li>
	                               
	              </ul>
	            </div>
			</li>
			<li>
				<div class="collapsible-header">
					Tables<span><i class="fas fa-angle-right right"></i></span>
				</div>
			   <div class="collapsible-body">
				 <ul>
				   <li><a href="/management/tables">List</a></li>
				   <li><a href="/management/tables/create">New</a></li>
								  
				 </ul>
			   </div>
		   </li>
		   <li>
			<div class="collapsible-header">
				Products<span><i class="fas fa-angle-right right"></i></span>
			</div>
		   <div class="collapsible-body">
			 <ul>
			   <li><a href="/management/categories">Categories</a></li>
			   <li><a href="/management/categories/create">New Category</a></li>
			   <li><a href="/management/products">Products List</a></li>
			   @if(Auth::user()->api!=NULL)
			   <li><a href="/management/products/import">Import products</a></li>
							  @endif
			 </ul>
		   </div>
	   </li>
	   <li><a href="/management/qrcodes">QR-Codes</a></li>
			<li><a href="/management/options/create">Settings</a></li>
			{{-- <li><a href="/profile">{{Auth::user()->name}}</a></li> --}}
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
			{{-- <li><a href="">Chicken</a></li>
			<li><a href="">Fried</a></li>
			<li><a href="">Stick</a></li>
			<li><a href="">Food</a></li>
			<li><a href="">Meat</a></li> --}}
		</ul>
	</div>
	<!-- end sidebar search -->

	<!-- sidebar cart -->
    <div class="sidebar-panel sidebar-cart">
        <div id="slide-out-cart" class="collapsible side-nav">
            <div class="content">
                <div class="cart-title">
                    <a href="">Orders</a>
                    <h5>18</h5>
                </div>
                <div class="clear"></div>
            </div>
			<div class="content">
                <div class="cart-title">
                    <a href="">Tickets</a>
                    <h5>18</h5>
                </div>
                <div class="clear"></div>
            </div>
			{{-- <div class="content">
                <div class="cart-title">
                    <a href="">Orders</a>
                    <h5>18</h5>
                </div>
                <div class="clear"></div>
            </div> --}}
            {{-- <div class="cart-button">
                <ul>
                    <li>
                        <button class="button">View Cart</button>
                    </li>
                    <li>
                        <button class="button">Checkout</button>
                    </li>
                </ul>
            </div> --}}
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
				<h3><img src="{{ asset('media/icon/logo.png') }}" alt="">{{Auth::user()->name}}</h3>
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
				<p>Copyright © {{ now()->year }} All Right Reserved</p>
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
