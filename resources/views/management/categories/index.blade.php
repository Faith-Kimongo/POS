@extends('layouts.management')

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
					@foreach(Auth::user()->categories as $category)
				<a href="/management/categories/{{$category->id}}">
					<div class="col s6 " style="margin-bottom: 7px">
						<div class="content">
							<i class="fas fa-users"></i>
							<h6>{{$category->name}}</h6>
							<span>{{$category->description}}</span>
						</div>
					</div>
				</a>
                    @endforeach

				</div>

			</div>

		</div>
	</div>
	<!-- end contact -->
@endsection
