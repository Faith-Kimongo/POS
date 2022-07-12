@extends('layouts.front')

@section('content')
	
<br>
<br>  
  {{-- <br> --}}
{{-- <br>
<br> --}}

	<div class="features segments" style="margin-top: 0px">
		<div class="container" >
            <div class="section-title mt-6 ml-5 pl-5"  style="margin-top: 10px">
                <h4> Select Restaurant to Place your order</h4>
                    
            </div>
			<div class="row">
                @foreach($courts->restaurant as $restaurant)
                {{-- /restaurant/{branch}/{hotel}/{table} --}}
			<a href="/restaurant/{{$restaurant->branches->first()->id}}/{{$restaurant->id}}/{{Session::get('table_no')}}">
				
				<div class="col s4" style="color: white" >
					<div class="content" style="background-image: url(../../../images/table.jpeg); height:100px" >
						{{-- <i class="fas fa-wifi"></i> --}}
					<h3 style="color: white">{{$restaurant->name}}</h3> <br> <span>{{$restaurant->location}}</span>
					</div>
				</div>
			</a>
				@endforeach

			</div>
			
		</div>
	</div>
	<!-- end product -->
@endsection
