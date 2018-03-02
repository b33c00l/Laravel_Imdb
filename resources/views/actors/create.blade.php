@extends('layouts.app',[
    'title' => 'Add new actor'
    ])

@section('content')
	<div class="text-center">
		<h1>Add new actor</h1>
	</div>
		<div class="col-md-8 offset-md-2">
			@include('partials.form_actors')
		</div>
@endsection