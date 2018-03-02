@extends('layouts.app',[
    'title' => 'All Actors Images'
    ])

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="col-md-12">
				@foreach($images as $image)
					<img width="40%" style="margin-top: 30px" src='{{asset('storage/images/'.$image->filename)}}'>
					<a href="{{ route('images/actor/destroy', $image->id) }}" class="btn btn-danger">Delete</a>
					<a href="{{ route('images/actor/featured', $image->id) }}" class="btn btn-info">Make featured</a><br>
				@endforeach
			</div>
		</div>
	</div>
@endsection

