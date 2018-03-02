<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;

use App\Movie;

use App\Actor;

use Storage;

use Auth;

use Session;

use App\Http\Requests\StoreActorRequest;

use App\Http\Requests\EditActorRequest;

class ActorsController extends Controller
{
    public function create()
    {   
        $movies = Movie::all();
    	return view('actors.create',[
            'movies' => $movies
        ]);
    }

    public function all()
    {   
        $actors = Actor::orderBy('id', 'desc')->paginate(15);
        return view('actors.all',[
            'actors' => $actors

        ]);
    }

    public function edit($id)
    {   
        $movies = Movie::all();
        $edit = Actor::findOrFail($id);

        $actor_movie = $edit->movies;
        
        return view('actors.edit', [
            'edit' => $edit,
            'movies' => $movies,
            'actor_movie' => $actor_movie,
            'featured' => false
        ]);
    }

    public function store(StoreActorRequest $request)
    {   
        $user = Auth::user();
        $actor_movie = $user->actors()->create($request->except('_token'));
        $actor_movie->movies()->attach($request->movies);

        Session::flash('success', 'Your form was successfully saved!');
        
        return redirect()->route('actors/all');
    }

    public function destroy($id)
    {   
        $actor = Actor::findOrFail($id);
        $actor->movies()->sync([]);

        foreach ($actor->images as $image )
        {
            Storage::delete('public/images/'.$image->filename);
        }
        
        $actor->images()->delete();
       
        $actor->delete();

        return redirect()->route('actors/all');
    }

    public function update($id, EditActorRequest $request)
    {   
        $actor_movie = Actor::findOrFail($id);
        $actor_movie->update($request->except('_token'));
        $actor_movie->movies()->sync($request->movies);

        return redirect()->route('actors/all');
    }

    public function single($id)
    {
        $single = Actor::findOrFail($id);
        $movies = $single->movies;
        return view('actors.single',[
            'single' => $single,
            'movies' => $movies
        ]);
    }

    public function all_actors_images($id)
    {
        $images = Actor::findOrFail($id)->images;

        return view('images.all_actors',[ 
            'images' => $images
        ]);
    }
}
