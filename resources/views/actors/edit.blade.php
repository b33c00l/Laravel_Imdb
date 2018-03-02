@extends('layouts.app',[
	'title' => 'Edit'	
	])
	@section('content')
	<div class="text-center">
		<h1>Edit an actor</h1>
	</div>

	<div class="col-md-8 offset-md-2">
		<form method="POST" action= "{{ route('actors/update', $edit->id)}}">
			{!! csrf_field() !!}
			<label>Name:</label>
			<input class="form-control" type="text" name="name" value="{{$edit->name}}">
			<label>Birthday:</label>
			<input class="form-control" type="date" name="birthday" value="{{$edit->birthday}}">
			<label>Deathday:</label>
			<input class="form-control" type="date" name="deathday" value="{{$edit->deathday}}">
			<label>Movies starred in:</label>
				<select class="form-control" name="movies[]" multiple="multiple">
					@foreach($movies as $movie)
						@if($actor_movie->contains($movie))
				 			<option value="{{$movie->id}}" selected>{{$movie->name}}</option>
				 		@else
				 			<option value="{{$movie->id}}">{{$movie->name}}</option>
				 		@endif
					@endforeach
				</select>
			<button class='btn btn-warning btn-lg btn-block' style="margin-top: 30px">Edit</button>
		</form>
	</div>
	@endsection


