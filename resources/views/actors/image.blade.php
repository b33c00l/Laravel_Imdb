@extends('layouts.app',[
    'title' => 'Add new actor image'
    ])

@section('content')
	<div class="text-center">
		<h1>Add new actor image</h1>
	</div>
		<div class="col-md-8 offset-md-2">
			<div class="row">
				<div class="col-md-12">
					<form method="POST" action= "{{ route('images/actor/store', $id)}}" enctype="multipart/form-data">
						{!! csrf_field() !!}
							<label>Select image to upload:</label>
							<input type="file" name="image" id="image">
							<button class='btn btn-warning btn-lg btn-block' style="margin-top: 30px">Submit</button>
					</form>
				</div>
			</div>
		</div>
@endsection