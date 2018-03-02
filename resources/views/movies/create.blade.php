@extends('layouts.app',[
    'title' => 'Add new movie'
    ])

@section('content')
	<div class="text-center">
		<h1>Add new movie</h1>
	</div>
		<div class="col-md-8 offset-md-2">
			@include('partials.form_movies')
		</div>
@endsection