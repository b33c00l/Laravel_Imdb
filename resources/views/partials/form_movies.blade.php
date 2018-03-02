<div class="row">
	<div class="col-md-12">
		<form method="POST" action= "{{ route('movies/store')}}">
			{!! csrf_field() !!}
				<label>Name:</label>
				<input class="form-control" type="text" name="name">
				<label>Year:</label>
				<input class="form-control" type="text" name="year">
				<label>Rating:</label>
				<input class="form-control" type="number" name="rating">
				<label>Category:</label>
				<select class="form-control" name="categories">
					@foreach($categories as $category)
				 		<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				<label>Actors starring:</label>
				<select class="form-control" name="actors[]" multiple="multiple">
					@foreach($actors as $actor)
				 		<option value="{{$actor->id}}">{{$actor->name}}</option>
					@endforeach
				</select>
				<label>Description:</label>
				<textarea class="form-control" rows="4" name="description"> </textarea>
				<button class='btn btn-danger btn-lg btn-block' style="margin-top: 30px">Submit</button>
		</form>
	</div>
</div>
