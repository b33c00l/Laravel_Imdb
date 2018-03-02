<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	protected $fillable = ['name', 'birthday', 'deathday', 'user_id'];

	public function images()
	{
		return $this->morphMany(Image::class, 'imagable');
	}

	public function movies()
	{
		return $this->belongsToMany(Movie::class, 'actor_movie');
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
