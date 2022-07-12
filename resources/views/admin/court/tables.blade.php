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
                        @foreach($court->tables as $table)
                        <div class="col s6">
                            <div class="content">
                                <img src="https://chart.apis.google.com/chart?cht=qr&chs=200x200&chl={{ url('/food-court/'.$court->id.'/'.$table->id) }}&chld=H|0" alt="">
                                {{-- <i class="fas fa-phone"></i> --}}
                                <h6>{{$table->name}}</h6>
                                <span>{{$table->number}}</span>
                            </div>
                        </div>
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
                {{-- <div class="wrap-form">
                    <form action="/admin/court" method="POST" >
                        @csrf
                        <input type="text" name="name" placeholder="Name">
                        <input type="text" name="location" placeholder="Location">
                        <input type="text" placeholder="Subject">
                        <textarea cols="30" rows="10" placeholder="Message"></textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div> --}}
            </div>
        </div>
        <!-- end contact -->
@endsection
