@extends('layouts.app',[
	'title' => 'Edit'	
	])
	@section('content')
	<div class="text-center">
		<h1>Edit a category</h1>
	</div>
	@foreach ($edit as $e)

	<div class="col-md-8 offset-md-2">
		<form method="POST" action= "{{ route('categories/update', $e->id)}}">
			{!! csrf_field() !!}
			<label>Name:</label>
			<input class="form-control" type="text" name="name" value="{{$e->name}}">
			<label>Description:</label>
			<textarea class="form-control" rows="10" name="description">{{$e->description}}</textarea>
			<button class='btn btn-success btn-lg btn-block' style="margin-top: 30px">Edit</button>
		</form>
	</div>


	@endforeach

	@endsection