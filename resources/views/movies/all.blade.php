@extends('layouts.app',[
'title' => 'Movies/All'	
])

@section('content')
<div class="col-md-8 offset-md-2">
	@admin
		<div class="text-right">
			<a class="btn btn-primary" href="{{ route('movies/create') }}">Create</a>
		</div>
	@else
	@endadmin
	<table class="table" width="100%">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Image</th>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Description</th>
				<th scope="col">Year</th>
				<th scope="col">Rating</th>
				<th scope="col">Category</th>
				@auth
					<th class="text-center" scope="col">Operators</th>
				@endauth
			</tr>
		</thead>
		<tbody>
			@foreach ($movies as $movie)
			<tr>
				<td><a href="{{ route('images/all_movies', $movie->id) }}"><img width="100px" src="{{$movie->featured_image}}"></a></td>
				<td>{{$movie->id}}</td>
				<td>{{$movie->name}}</td>
				<td>{{str_limit($movie->description, 100)}}</td>
				<td>{{$movie->year}}</td>
				<td>{{$movie->rating}}</td>
				<td>{{$movie->category->name}}</td>
				@auth
					@admin
						<td class="text-right">
							<a class="btn btn-warning" href="{{ route('images/movie/create', $movie->id)}}">Image</a>
							<a class="btn btn-info" href="{{ route('movies/edit', $movie->id)}}">Edit</a>
							<a class="btn btn-danger" href="{{ route('movies/destroy', $movie->id)}}">Delete</a>
						</td>
					@else
						<td class="text-right">
							<a class="btn btn-warning" href="{{ route('images/movie/create', $movie->id)}}">Image</a>
						</td>
					@endadmin
				@else
				@endauth
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
