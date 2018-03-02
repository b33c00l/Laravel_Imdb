@auth
	@admin
	    <li><a class="nav-link" href="{{ route('categories/all') }}">Categories</a></li>
	    <li><a class="nav-link" href="{{ route('movies/all') }}">Movies</a></li>
	    <li><a class="nav-link" href="{{ route('actors/all') }}">Actors</a></li>
	    <li><a class="nav-link" href="{{ route('users/all') }}">Users</a></li>
	@else
	    <li><a class="nav-link" href="{{ route('movies/all') }}">Movies</a></li>
	    <li><a class="nav-link" href="{{ route('actors/all') }}">Actors</a></li>
	@endadmin
@else 
	<li><a class="nav-link" href="{{ route('movies/all') }}">Movies</a></li>
	<li><a class="nav-link" href="{{ route('actors/all') }}">Actors</a></li>
@endauth
