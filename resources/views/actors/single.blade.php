@extends('layouts.app',[
    'title' => 'Single Actor'
    ])

@section('content')
	<div class="text-center">
		<h1>{{$single->name}}</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="{{ route('actors/single', $single->id) }}"><img height="250px" width="180px" src="{{$single->featured_image}}"></a>
			</div>
			<div class="col-md-2">
				<label>Birthday:</label>
				<h3>{{$single->birthday}}</h3>
				<label>Deathday:</label>
				<h3>{{$single->deathday}}</h3>
			</div>
		</div>
		<div class="row">
		
				@foreach ($movies as $movie)
					<figure style="margin: 10px; margin-top: 30px">
						<a href="{{ route('movies/single', $movie->id) }}"><img height="200px" width="150px" src="{{$movie->featured_image}}"></a>
						<figcaption>{{$movie->name}}</figcaption>
					</figure>
				@endforeach
			</div>
	
	</div>
@endsection