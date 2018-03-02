@extends('layouts.app',[
'title' => 'Users/All'	
])

@section('content')
<div class="col-md-8 offset-md-2">
	<div class="text-right">
		<a class="btn btn-primary" href="{{ route('users/create') }}">Create</a>
	</div>
	<table class="table" width="100%">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Role</th>
				<th class="text-center" scope="col">Operators</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->role}}</td>
				<td class="text-right">
					<a class="btn btn-info" href="{{ route('users/edit', $user->id)}}">Edit</a>
					<a class="btn btn-danger" href="{{ route('users/destroy', $user->id)}}">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
