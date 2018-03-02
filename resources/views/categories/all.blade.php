@extends('layouts.app',[
'title' => 'All'	
])

@section('content')
<div class="col-md-8 offset-md-2">
	<div class="text-right">
		<a class="btn btn-primary" href="{{ route('categories/create') }}">Create</a>
	</div>
	<table class="table" width="100%">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Description</th>
				<th class="text-center" scope="col">Operators</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
				<td>{{$category->description}}</td>
				<td class="text-right">
					<a class="btn btn-info" href="{{ route('categories/edit', $category->id)}}">Edit</a>
					<a class="btn btn-danger" href="{{ route('categories/destroy', $category->id)}}">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
