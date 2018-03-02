<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $fillable = ['name', 'description', 'year', 'rating', 'user_id', 'category_id'];

   	public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function actors()
	{
		return $this->belongsToMany(Actor::class, 'actor_movie');
	}

	public function images()
	{
		return $this->morphMany(Image::class, 'imagable');
	}

	public function getFeaturedImageAttribute()
	{	
		$file = $this->images()->where('featured', true)->first();
		if ($file == null) {
			return 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1024px-No_image_3x4.svg.png';
		} else {
			return asset('storage/images/'.$file->filename.'');
		}
		
	}
}
