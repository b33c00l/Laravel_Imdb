<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

use App\Movie;

use App\Category;

use App\Image;

use App\Http\Requests\StoreMovieRequest;

use App\Http\Requests\EditMovieRequest;

use Auth;

use Session;

use Storage;

class MoviesController extends Controller
{
    public function index()
    {  
        $categories = Category::all();
        $movies = Movie::orderBy('id','desc')->get();
        $actors = Actor::all();
        $images = Image::all();

        return view('index',[
            'categories' => $categories,
            'movies' => $movies, 
            'actors' => $actors, 
            'images' => $images
        ]);
    }

    public function all()
    {	
        $movies = Movie::orderBy('id', 'desc')->paginate(15);

        return view('movies.all',[
            'movies' => $movies
        ]);
    }

    public function create()
    {   
        $actors = Actor::all();
    	$categories = Category::all();
        return view('movies.create',[
        	'categories' => $categories,
            'actors' => $actors,
        ]);
    }
    
    public function store(StoreMovieRequest $request)
    {

        $user = Auth::user();
        $movie_actor = $user->movies()->create($request->except('_token') + [
            'category_id' => $request->categories
        ]);
        $movie_actor->actors()->attach($request->actors);

        Session::flash('success', 'Your form was successfully saved!');
        
        return redirect()->route('movies/all');
    }

    public function edit($id)
    {   
        $actors = Actor::all();
        $edit = Movie::findOrFail($id);
        $categories = Category::all();

        $movie_actor = $edit->actors;
        
        return view('movies.edit', [
            'edit' => $edit,
            'actors' => $actors,
            'movie_actor' => $movie_actor,
            'categories' => $categories
        ]);
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->actors()->sync([]);

        foreach ($movie->images as $image )
        {
            Storage::delete('public/images/'.$image->filename);
        }
        
        $movie->images()->delete();
       
        $movie->delete();

        return redirect()->route('movies/all');
    }

    public function update($id, EditMovieRequest $request)
    {   
        $categories = Category::findOrFail($id);
        $movie_actor = Movie::findOrFail($id);
        $movie_actor->update($request->except('_token') + [
            'category_id' => $request->categories
        ]);
        $movie_actor->actors()->sync($request->actors);

        return redirect()->route('movies/all');
    }

    public function single($id)
    {
        $single = Movie::findOrFail($id);
        $actors = $single->actors;
        $categories = $single->category;
        return view('movies.single',[
            'single' => $single,
            'actors' => $actors,
            'categories' => $categories
        ]);
    }

    public function all_movies_images($id)
    {   
        $images = Movie::findOrFail($id)->images;

        return view('images.all_movies',[ 
            'images' => $images
        ]);
        
    }

}
