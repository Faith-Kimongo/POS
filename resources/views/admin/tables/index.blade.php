@extends('layouts.admin')

@section('content')
<br>
<br>    <br>
<br>
<br>
		<!-- contact -->
        <div class="contact segments-page">
            <div class="container">
                <div class="wrap-info">
                    <div class="row">
                        @foreach($courts as $court)
                    <a href="/admin/court/{{$court->id}}">
                        <div class="col s6">
                            <div class="content">
                                <i class="fas fa-phone"></i>
                                <h6>{{$court->name}}</h6>
                                <span>{{$court->location}}</span>
                            </div>
                        </div>
                    </a>
                        @endforeach
                        
                    </div>
                    {{-- <div class="row">
                        <div class="col s6">
                            <div class="content">
                                <i class="fas fa-map-marker-alt"></i>
                                <h6>Find Us</h6>
                                <span>Carvers, Nevada</span>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="content">
                                <i class="fas fa-user-plus"></i>
                                <h6>Follow Us</h6>
                                <ul>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                    <li><a href=""><i class="fab fa-google"></i></a></li>
                                    <li><a href=""><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="wrap-form">
                    <form action="/admin/table" method="POST" >
                        @csrf
                        <input type="text" name="name" placeholder="Name">
                        {{-- <input type="text" name="location" placeholder="Location"> --}}
                        <input type="text" name="number" placeholder="Table Number">
                        <select name="court" class="browser-default select-type">
                            <option value="" disabled selected>Food Court</option>
                            @foreach($courts as $court)
                            <option value="{{$court->id}}">{{$court->name}}</option>
                           @endforeach
                        </select>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end contact -->
@endsection
