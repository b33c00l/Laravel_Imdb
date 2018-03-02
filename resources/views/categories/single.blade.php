@extends('layouts.app',[
    'title' => 'Movies by category'
    ])

@section('content')
	<div class="text-center">
		<h1>{{$categories->name}}</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@foreach($single as $item)
					<a href="{{ route('movies/single', $item->id) }}"><img height="250px" width="180px" src="{{$item->featured_image}}"></a>
				@endforeach
			</div>
		</div>
	</div>
@endsection