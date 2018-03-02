<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = ['filename', 'user_id', 'imagable_id', 'imagable_type', 'featured'];

	public function user()
	{
    	return $this->belongsTo(User::class);
    }

    

    public function imagable()
    {
    	return $this->morphTo();
    }
    
}
