@extends('layouts.app',[
	'title' => 'Edit User'	
	])
	@section('content')
	<div class="text-center">
		<h1>Edit a user</h1>
	</div>
	@foreach ($edit as $e)

	<div class="col-md-8 offset-md-2">
		<form method="POST" action= "{{ route('users/update', $e->id)}}">
			{!! csrf_field() !!}
			<label>Name:</label>
			<input class="form-control" type="text" name="name" value="{{$e->name}}">
			<label>Email:</label>
			<input class="form-control" type="email" name="email" value="{{$e->email}}">
			<label>Password:</label>
			<input class="form-control" type="password" name="password" value="{{$e->password}}">
			<label>Role:</label>
			<input class="form-control" type="text" name="role" value="{{$e->role}}">
			<button class='btn btn-info btn-lg btn-block' style="margin-top: 30px">Edit</button>
		</form>
	</div>


	@endforeach

	@endsection