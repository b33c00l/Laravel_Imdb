@extends('layouts.app',[
'title' => 'Actors/All'	
])

@section('content')
<div class="col-md-8 offset-md-2">
	@admin
		<div class="text-right">
			<a class="btn btn-primary" href="{{ route('actors/create') }}">Create</a>
		</div>
	@else
	@endadmin
	<table class="table" width="100%">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Image</th>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Birthday</th>
				<th scope="col">Deathday</th>
				@auth
					<th class="text-center" scope="col">Operators</th>
				@endauth
			</tr>
		</thead>
		<tbody>
			@foreach ($actors as $actor)
			<tr>
				<td><a href="{{ route('images/all_actors', $actor->id) }}"><img width="100px" src="{{$actor->featured_image}}"></a></td>
				<td>{{$actor->id}}</td>
				<td>{{$actor->name}}</td>
				<td>{{$actor->birthday}}</td>
				<td>{{$actor->deathday}}</td>
				@auth
					@admin
						<td class="text-right">
							<a class="btn btn-warning" href="{{ route('images/actor/create', $actor->id)}}">Image</a>
							<a class="btn btn-info" href="{{ route('actors/edit', $actor->id)}}">Edit</a>
							<a class="btn btn-danger" href="{{ route('actors/destroy', $actor->id)}}">Delete</a>
						</td>
					@else
						<td class="text-right">
							<a class="btn btn-warning" href="{{ route('images/actor/create', $actor->id)}}">Image</a>
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
