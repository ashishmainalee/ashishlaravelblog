<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

	use SoftDeletes;

	protected $fillable = [
        'category_id', 'featured','title','content', 'slug'
	];

	protected $dates = ['deleted_at'];

    public function category()
    {
    	return $this -> belongsTo('App\Category');
    }

    public function tags()
    {
        return $this -> belongsToMany('App\Tag');
    }

    /*
	Accessor for image
	inster a column name after get and Attribute
    */
    public function getFeaturedAttribute($featured){
    	return asset($featured);
    }
}
