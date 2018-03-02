<div class="row">
	<div class="col-md-12">
		<form method="POST" action= "{{ route('users/store')}}">
			{!! csrf_field() !!}
				<label>Name:</label>
				<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
				<label>Email:</label>
				<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
				<label>Password:</label>
				<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                <label>Confirm Password:</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                <label>Role:</label>
                <input class="form-control" type="text" name="role">
				<button class='btn btn-info btn-lg btn-block' style="margin-top: 30px">Submit</button>
		</form>
	</div>
</div>
