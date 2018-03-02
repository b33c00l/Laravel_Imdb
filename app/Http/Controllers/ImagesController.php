<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Actor;

use App\Movie;

use App\Image;

use Storage;

use App\Http\Requests\StoreImageRequest;

class ImagesController extends Controller
{
    public function actor_create($id)
    {
    	return view('actors.image',[
    		'id' => $id,
    ]);
    }

    public function actor_store($id, StoreImageRequest $request)
    {
    	
    	$file = $request->file('image');

    	$path = $file->storePublicly('public/images');

    	$filename = basename($path);

    	$actor = Actor::findOrFail($id);

    	$actor->images()->create([
            'filename' => $filename,
            'user_id' => Auth::user()->id,
            'featured' => false
    ]);

    	return redirect()->route('actors/all');
    }

    public function movie_create($id)
    {
        return view('movies.image',[
            'id' => $id,
    ]);
    }

    public function movie_store($id, StoreImageRequest $request)
    {
        
        $file = $request->file('image');

        $path = $file->storePublicly('public/images');

        $filename = basename($path);

        $movie = Movie::findOrFail($id);

        $movie->images()->create([
            'filename' => $filename,
            'user_id' => Auth::user()->id,
            'featured' => false
    ]);

        return redirect()->route('movies/all');
    }

    public function movie_destroy($id)
    {
        $image = Image::findOrFail($id);

        Storage::delete('public/images/'.$image->filename);

        $image->delete();

        return redirect()->route('movies/all');
    }

    public function movie_featured($id)
    {
        $image = Image::findOrFail($id);

        $image->imagable->images()->update([
            'featured' => 0
        ]);

        $image->update([
            'featured' => 1
        ]);

        return redirect()->route('movies/all');
    }

    public function actor_destroy($id)
    {
        $image = Image::findOrFail($id);

        Storage::delete('public/images/'.$image->filename);

        $image->delete();

        return redirect()->route('actors/all');
    }

    public function actor_featured($id)
    {
        $image = Image::findOrFail($id);

        $image->imagable->images()->update([
            'featured' => 0
        ]);

        $image->update([
            'featured' => 1
        ]);

        return redirect()->route('actors/all');
    }


}
