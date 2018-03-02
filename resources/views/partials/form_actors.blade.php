<div class="row">
	<div class="col-md-12">
		<form method="POST" action= "{{ route('actors/store')}}">
			{!! csrf_field() !!}
				<label>Name:</label>
				<input class="form-control" type="text" name="name">
				<label>Birthday:</label>
				<input class="form-control" type="date" name="birthday">
				<label>Deathday:</label>
				<input class="form-control" type="date" name="deathday">
				<label>Movies starred in:</label>
				<select class="form-control" name="movies[]" multiple="multiple">
					@foreach($movies as $movie)
				 		<option value="{{$movie->id}}">{{$movie->name}}</option>
					@endforeach
				</select>
				<button class='btn btn-warning btn-lg btn-block' style="margin-top: 30px">Submit</button>
		</form>
	</div>
</div>
