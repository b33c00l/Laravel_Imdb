<div class="row">
	<div class="col-md-12">
		<form method="POST" action= "{{ route('categories/store')}}">
			{!! csrf_field() !!}
				<label>Name:</label>
				<input class="form-control" type="text" name="name">
				<label>Description:</label>
				<textarea class="form-control" rows="10" name="description"> </textarea>
				<button class='btn btn-success btn-lg btn-block' style="margin-top: 30px">Submit</button>
		</form>
	</div>
</div>
