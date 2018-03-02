@extends('layouts.app',[
    'title' => 'Index'
    ])

@section('content')
	<div class="container">
		<div class="row">
			<label><h1>Newest movies added:</h1></label>
				<div class="col-md-12"></div>
					@foreach ($movies as $movie)
						<div class="col-md-2">
							<figure>
								<a href="{{ route('movies/single', $movie->id) }}"><img width="100%" height="250px" src="{{$movie->featured_image}}"></a>
								<figcaption>{{$movie->name}}</figcaption>
								<figcaption>Rating: {{$movie->rating}}</figcaption>
							</figure>
						</div>
					@endforeach
		</div>
	</div>
@endsection