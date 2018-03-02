@extends('layouts.app',[
    'title' => 'Single Movie'
    ])

@section('content')
	<div class="text-center">
		<h1>{{$single->name}}</h1>
		<figcaption><a href="{{ route('categories/single', $categories->id) }}">{{$categories->name}}</a></figcaption>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="{{ route('movies/single', $single->id) }}"><img height="250px" width="180px" src="{{$single->featured_image}}"></a>
			</div>
			<div class="col-md-7">
				<label>Description:</label>
				<p>{{$single->description}}</p>
				<label>Year:</label>
				<h3>{{$single->year}}</h3>
				<label>Rating:</label>
				<h3>{{$single->rating}}</h3>
			</div>
		</div>
		<div class="row">
		
				@foreach ($actors as $actor)
					<figure style="margin: 10px; margin-top: 30px">
						<a href="{{ route('actors/single', $actor->id) }}"><img height="200px" width="150px" src="{{$actor->featured_image}}"></a>
						<figcaption>{{$actor->name}}</figcaption>
					</figure>
				@endforeach
			</div>
	
	</div>
@endsection