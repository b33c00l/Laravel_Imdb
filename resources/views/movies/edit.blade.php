@extends('layouts.app',[
	'title' => 'Edit'	
	])
	@section('content')
	<div class="text-center">
		<h1>Edit a movie</h1>
	</div>

	<div class="col-md-8 offset-md-2">
		<form method="POST" action= "{{ route('movies/update', $edit->id)}}">
			{!! csrf_field() !!}
			<label>Name:</label>
			<input class="form-control" type="text" name="name" value="{{$edit->name}}">
			<label>Year:</label>
			<input class="form-control" type="text" name="year" value="{{$edit->year}}">
			<label>Rating:</label>
			<input class="form-control" type="number" name="rating" value="{{$edit->rating}}">
			<label>Category:</label>
			<select class="form-control" name="categories">
				@foreach($categories as $category)
					@if ($category->id == $edit->category_id)
						<option name="category" selected value="{{$category->id}}">{{$category->name}}</option>
					@else
						<option name="category" value="{{$category->id}}">{{$category->name}}</option>
					@endif	
				@endforeach
			</select>
			<label>Actors starred in:</label>
				<select class="form-control" name="actors[]" multiple="multiple">
					@foreach($actors as $actor)
						@if($movie_actor->contains($actor))
				 			<option value="{{$actor->id}}" selected>{{$actor->name}}</option>
				 		@else
				 			<option value="{{$actor->id}}">{{$actor->name}}</option>
				 		@endif
					@endforeach
				</select>
			<label>Description:</label>
			<textarea class="form-control" rows="4" name="description">{{$edit->description}}</textarea>
			<button class='btn btn-danger btn-lg btn-block' style="margin-top: 30px">Edit</button>
		</form>
	</div>



	@endsection