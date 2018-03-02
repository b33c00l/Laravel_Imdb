<?php

use Illuminate\Database\Seeder;

use App\Movie;

use App\Actor;

class ActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 2;
    	
    	for ($i=0; $i < $count ; $i++) { 

    		$movies = Movie::first();

    		dd($movies);

            $actors = file_get_contents('http://www.theimdbapi.org/api/find/movie?title='.$movies->name.'&year='.$movies->year.'');

            $actor[] = json_decode($actors,true);  
    		

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
  
    	}
    }
}
