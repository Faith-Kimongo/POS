<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="{{ asset('media/icon/logo.png') }}">
	<title>Smart Waiter</title>
	@laravelPWA
	<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
	<link rel="stylesheet" href="{{ asset('css/loaders.css') }}">
	<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	


</head>
<body>

	<!-- preloader -->
	<div class="preloader">
		<div class="spinner"></div>
	</div>
	<!-- end preloader -->
	
	<!-- navbar -->
	@if ($hotel!=NULL)
	<div class="navbar navbar-home" style="background-color:{{$hotel->hotel->options->where('option','color')->last()->value}} ">
	@else 
	<div class="navbar navbar-home" >
	@endif	
		<div class="container">
			<div class="row">
				<div class="col s3">
					<div class="content-left">
						<a href="#slide-out" data-activates="slide-out" class="sidebar"><i class="fas fa-bars"></i></a>
					</div>
				</div>
				<div class="col s6" >
					<div class="content-center">
						@if ($hotel!=NULL)
						<a href="#"><h1>{{$hotel->hotel->name}}</h1></a>
						@else 
						<a href="#"><h1>Smart Waiter</h1></a>
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
	                            <i class="fas fa-bell"></i><sup>{{$carts->where('status',NULL)->count()}}</sup></i>
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
					@if ($hotel!=NULL)
                    <div class="image" >
						
                    	<a href="/"><img src="{{ asset('media/icon/') }}/{{$hotel->hotel->options->where('option','logo')->last()->value}}" style="width: 100%"alt=""> </a>
						
					</div>
                    <h3>{{$hotel->hotel->name}}</h3>
					<span>{{$hotel->hotel->options->where('option','tag')->first()->value}}</span>
					@else 
						@endif
                </div>
            </li>
		<li><a href="/restaurant/{{Session::get('branch')}}/{{Session::get('hotel_id')}}/{{Session::get('table_no')}}">Home</a></li>
			@if($hotel==NULL)
			@else
			@foreach($hotel->categories as $category) 
			<li>
	         	<div class="collapsible-header">
					{{$category->name}}<span><i class="fas fa-angle-right right"></i></span>
	         	</div>
	            <div class="collapsible-body">
	              <ul>
					@foreach($category->subcategories as $subcategory)
					<li><a href="/sub/category/{{$subcategory->id}}">{{ucfirst($subcategory->name)}}</a></li>
					@endforeach

	              </ul>
	            </div>
			</li>
			@endforeach
			@endif
			
			
			<li><a href="/orders">My Orders</a></li>
			{{-- <li><a href="register.html">Register</a></li> --}}
			{{-- <li><a href="index.html">Log Out</a></li> --}}
			<li><a href="#">Contact us</a></li>
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
			<li><a href="">Chicken</a></li>
			<li><a href="">Beef</a></li>
			
		</ul>
	</div>
	<!-- end sidebar search -->

	<!-- sidebar cart -->
    <div class="sidebar-panel sidebar-cart">
        <div id="slide-out-cart" class="collapsible side-nav">
			@foreach($carts as $cart)
			<div class="content">
                <div class="cart-img">
                    <img src="{{ asset('media') }}/images/coffee.jpg" alt="">
                </div>
                <div class="cart-title">
                    <a href="">{{$cart->product->name}}</a>
				<h5>KSh. {{($cart->quantity)*($cart->product->cost)}}</h5>
                </div>
                <div class="cart-remove">
                    <a href=""><i class="fas fa-trash-alt"></i></a>
                </div>
                <div class="clear"></div>
			</div>
			@endforeach


            <div class="cart-button">
                <ul>
                    <li>
                       <a href="/cart"> <button class="button">View Cart</button> </a>
                    </li>
                    {{-- <li>
                        <button class="button">Checkout</button>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
    <!-- end sidebar cart -->

        <main class="py-4">
            @yield('content')
        </main>
	<!-- </div> -->
	@if($carts->where('status',NULL)->count()>0)
		{{-- @if($carts->count()>0) --}}
		{{-- <div> --}}
			<div class="total-pay" style="bottom: 50px;
			position: fixed;
			width: 100%;">
				<div class="row">
					<div class="col s12">
						<div class="content">
							<a href="/cart"> <button class="button" style="width: 100%; margin-bottom:10px; background-color:green; margin-right:10%"><i class="fas fa-shopping-cart"></i> View Order</button> </a>
							
						</div>
					</div>
				

				</div>
				{{-- <a href="/orders" ><button class="button"><i class="fa fa-send"></i>Check Status</button> </a> --}}
			</div>



		
		{{-- </div> --}}
		@endif
	<!-- footer -->
	{{-- <nav class="mobile-bottom-nav">
		<div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
			<div class="mobile-bottom-nav__item-content">
				<i class="material-icons">home</i>
				one
			</div>		
		</div>
		<div class="mobile-bottom-nav__item">		
			<div class="mobile-bottom-nav__item-content">
				<i class="material-icons">mail</i>
				two
			</div>
		</div>
		<div class="mobile-bottom-nav__item">
			<div class="mobile-bottom-nav__item-content">
				<i class="material-icons">person</i>
				three
			</div>		
		</div>
		
		<div class="mobile-bottom-nav__item">
			<div class="mobile-bottom-nav__item-content">
				<i class="material-icons">phone</i>
				four
			</div>		
		</div>
	</nav> --}}


	
	@if ($hotel!=NULL)
	<footer style="background-color:{{$hotel->hotel->options->where('option','color')->last()->value}} ">
		@else 
		<footer>
		@endif
		<div class="container">
			{{-- <div class="wrap-logo">
				@if ($hotel!=NULL)
				<h3>{{$hotel->hotel->name}}</h3>
				@else 
				<h3>Smart Waiter</h3>
				@endif
			</div> --}}
			{{-- <div class="wrap-info">
				<ul>
					@if ($hotel!=NULL)
					<li>{{$hotel->hotel->name}} , {{$hotel->hotel->location}}</li>
					<li><a href="tel:{{$hotel->phone}}">{{$hotel->phone}}</a></li>
					<li> <a href="mailto:{{$hotel->hotel->email}}">{{$hotel->hotel->email}}</a></li>
					@endif
				</ul>
			</div> --}}
			<div class="footer-text">
				<div class="row">
				<div class="col s3">
					<div class="content-left">
						<a href="/restaurant/{{Session::get('branch')}}/{{Session::get('hotel_id')}}/{{Session::get('table_no')}}" data-activates="slide-out"><i class="fas fa-home"></i> <br><span>Home</span></a>
					</div>
				</div>
				<div class="col s3">
					<div class="content-left">
						<a href="/orders" data-activates="slide-out" ><i class="fas fa-shopping-cart"></i> <br><span>Orders</span></a>
					</div>
				</div>
				<div class="col s3">
					<div class="content-left">
						<a href="#slide-out" data-activates="slide-out" ><i class="fas fa-user"></i> <br><span>Contacts</span></a>
					</div>
				</div>
				{{-- <div class="col s3">
					<div class="content-left">
						<a href="#slide-out" data-activates="slide-out" ><i class="fas fa-info"></i> <br><span>Help</span></a>
					</div>
				</div> --}}
				{{-- <p>Copyright  <strong> Smart Waiter</strong> © {{ now()->year }} All Right Reserved</p> --}}

				{{-- <div class="content-cart">
					<a href="#slide-out-cart" data-activates="slide-out-cart" class="sidebar-right-cart">
						<i class="fas fa-shopping-cart"><sup>{{$carts->where('status',NULL)->count()}}</sup></i>
					</a>
				</div> --}}
				</div>
			</div>
		</div>
	</footer>
	{{-- <a href="#" class="float">
		<i class="fas fa-shopping-cart my-float"> {{$carts->where('status',NULL)->count()}}</i>
		<h1 class="my-float"> Cart</h1>
		<i class="fa fa-plus my-float"> Cart</i>
		</a> --}}

		<div id="container-floating">

			{{-- <div class="nd5 nds" data-toggle="tooltip" data-placement="left" data-original-title="Simone"></div> --}}
			<div class="nd4 nds" data-toggle="tooltip" data-placement="left"><img class="reminder">
			  <p class="letter"> C {{$carts->where('status',NULL)->count()}}</p>
			</div>
			{{-- <div class="nd3 nds" data-toggle="tooltip" data-placement="left" data-original-title="Reminder"> <i class="fas fa-phone-alt reminder"> I</i><img class="reminder" src="//ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/1x/ic_reminders_speeddial_white_24dp.png" /></div> --}}
			<div class="nd3 nds" data-toggle="tooltip" data-placement="left" data-original-title="Reminder">  <img class="reminder">
				<p class="letter">Call <i class="fas fa-phone-alt"></i></p>
			</div>
			{{-- <div class="nd1 nds" data-toggle="tooltip" data-placement="left" data-original-title="Edoardo@live.it"><img class="reminder">
			  <p class="letter">E</p>
			</div> --}}
		  
			<div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="newmail()">
			  <p class="plus">+</p>
			  <img class="edit" src="http://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/1x/bt_compose2_1x.png">
			</div>
		  
		  </div>





	<!-- end footer -->
	<script src="{{ asset('js/html5-qrcode.min.js') }}"></script>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/materialize.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
<script >
	const anim = (obj) => {
  document.querySelectorAll("li").forEach(e => {
    e.classList.remove("anim")
  })
  obj.classList.add("anim")
}
</script>
</body>
</html>
