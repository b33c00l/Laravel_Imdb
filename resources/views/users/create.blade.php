@extends('layouts.app',[
    'title' => 'Add new user'
    ])

@section('content')
	<div class="text-center">
		<h1>Add new user</h1>
	</div>
		<div class="col-md-8 offset-md-2">
			@include('partials.form_users')
		</div>
@endsection