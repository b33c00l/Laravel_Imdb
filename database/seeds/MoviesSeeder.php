<?php

use Illuminate\Database\Seeder;

use App\Movie;
use App\Actor;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$count = 1;
    	
    	for ($i=0; $i < $count ; $i++) { 
    		$rand_category = rand(6, 11);

            $movies = file_get_contents('https://tv-v2.api-fetch.website/random/movie');
            $movie[] = json_decode($movies,true);  
    		

    		$movies = Movie::create([
    		'name' => $movie[$i]['title'],
    		'category_id' => $rand_category,
    		'user_id' => 1, 
    		'description' => $movie[$i]['synopsis'],
    		'year' => $movie[$i]['year'],
    		'rating' => $movie[$i]['rating']['percentage']
    		]);

    		$filename = basename($movie[$i]['images']['poster']);
    		$file_content = file_get_contents($movie[$i]['images']['poster']);
    		Storage::put('public/images/'.$filename,$file_content);

    		$image = $movies->images()->create([
    		'filename' => $filename,
    		'featured' => 1,
    		'user_id' => 1
    		]);

            $imdb = $movie[$i]['imdb_id'];

            $actors = file_get_contents('http://www.theimdbapi.org/api/movie?movie_id='.$imdb.'');
            $actor[] = json_decode($actors, true);
            
            $j = 0;
            while ($j <= 1) {
                $actors_array[] = explode(' ', $actor[$i]['cast'][$j]['name']);
                $j++;
            }            
            
            $actors_list = file_get_contents('http://www.theimdbapi.org/api/find/person?name='.$actors_array[$i][0].'+'.$actors_array[$i][1].'');
            $actoriai[] = json_decode($actors_list, true);

            dd($actoriai);

            $actors = Actor::create([
                'name' => $actor[$i]['cast'][$j]['name'],
                'birthday' => $actoriai[$i][0]['birthday'],
                'deathday' => null,
                'user_id' => 1

            ]);

            $filename = basename($actor[$i]['cast'][$j]['image']);
            $file_content = file_get_contents($actor[$i]['cast'][$j]['image']);
            Storage::put('public/images/'.$filename,$file_content);

            $image = $actors->images()->create([
            'filename' => $filename,
            'featured' => 1,
            'user_id' => 1
            ]);

            $actor_movie = $actors->movies()->attach($movies->id);
            


  
    	}
    }
}
