@extends('layouts.app',[
    'title' => 'Add new category'
    ])

@section('content')
	<div class="text-center">
		<h1>Add new category</h1>
	</div>
		<div class="col-md-8 offset-md-2">
			@include('partials.form_categories')
		</div>
@endsection