@extends('layouts.front')

@section('content')
<br>
<br>    <br>
<br>
<br>

		<!-- product details -->
        <div class="product-details segments-page">

            <div class="container">
                <div class="section-title mt-6 ml-5 pl-5"  style="margin-top: 10px">
                    @if($product->hotel->api==NULL)
                    <h4> <a href="/restaurant/{{Session::get('branch')}}/{{Session::get('hotel_id')}}/{{Session::get('table_no')}}">Home </a>  <i class="fas fa-arrow-right"></i>{{ucfirst($product->subcat->category->name)}}<i class="fas fa-arrow-right"></i> {{ucfirst($product->subcat->name)}}</h4>
                    @endif
                </div>
                <form method="POST" action="/client/cart" >
                    @csrf
                <div class="wrap-content">
                    <div class="product-d-slide owl-carousel owl-theme">
                        @if($product->images->count()==0)
                        
                        <div class="content">
                             <img src="{{ asset('media') }}/icon/food.jpg" onerror="this.onerror=null; this.src='{{ asset('media') }}/icon/table.jpeg'"style="height: 100px" alt="">
                        </div>
                        
                        @else
                        @foreach($product->images as $image)
                        <div class="content">
                            <img src="{{ asset('media') }}/products/{{$image->name}}" alt="">
                        </div>
                        @endforeach
                        @endif
                        
                    </div>
                    <div class="desc-short" style="margin-top: 10px">
                        <h4>{{$product->name}}</h4>
                        <h5>KSh. {{ number_format($product->cost,2)}}</h5>
                        <p>{{$product->description}}</p>
                        <input type="number" name="quantity" required placeholder="Quantity" value="1">
                        <input type="text" name="product" hidden required placeholder="product" value="{{$product->id}}">
                        <button class="button" onclick="this.form.submit()"><i class="fas fa-shopping-cart"></i> Add to Order</button>
                    </div>
                </form>
                </div>
                {{-- <div class="wrap-info">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s3"><a class="active" href="#tabs1">Details</a></li>
                                <li class="tab col s3"><a href="#tabs2">Reviews</a></li>
                            </ul>
                        </div>
                        <div id="tabs1" class="col s12">
                            <div class="content-tabs">
                                <div class="details">
                                    <div class="wrap-title">
                                        <h5>Description</h5>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, asperiores facere cum? Unde, quia eligendi iure deserunt ea ipsam consequatur, obcaecati nostrum similique fugiat suscipit sint aliquam</p>
                                </div>
                            </div>
                        </div>
                        <div id="tabs2" class="col s12">
                            <div class="content-tabs">
                                <div class="comment-people">
                                    <div class="content no-pt">
                                        <div class="image">
                                            <img src="images/testimonial1.png" alt="">
                                        </div>
                                        <div class="text">
                                            <h5>Kiyandra</h5>
                                            <ul>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur sequi</p>
                                            <p class="date">12 Jan, 2018<span><i class="fas fa-reply"></i>Reply</span></p>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="image">
                                            <img src="images/testimonial2.png" alt="">
                                        </div>
                                        <div class="text">
                                            <h5>Starla</h5>
                                            <ul>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur sequi</p>
                                            <p class="date">12 Jan, 2018<span><i class="fas fa-reply"></i>Reply</span></p>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="image">
                                            <img src="images/testimonial3.png" alt="">
                                        </div>
                                        <div class="text">
                                            <h5>Princella</h5>
                                            <ul>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur sequi</p>
                                            <p class="date">12 Jan, 2018<span><i class="fas fa-reply"></i>Reply</span></p>
                                        </div>
                                    </div>
                                    <div class="content no-bb">
                                        <div class="image">
                                            <img src="images/testimonial2.png" alt="">
                                        </div>
                                        <div class="text">
                                            <h5>Jennifer</h5>
                                            <ul>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur sequi</p>
                                            <p class="date">12 Jan, 2018<span><i class="fas fa-reply"></i>Reply</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <div class="wrap-title">
                        <h5>Leave Your Reply</h5>
                    </div>
                    <form>
                        <input type="text" placeholder="Name">
                        <input type="email" placeholder="Email">
                        <textarea cols="30" rows="10" placeholder="Message"></textarea>
                        <button class="button">Submit</button>
                    </form>
                </div> --}}
            </div>
        </div>
        <!-- end product details -->
@endsection
