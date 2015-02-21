<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent implements SluggableInterface{

    use SluggableTrait;
	use SoftDeletingTrait;

    protected $table = 'posts';
    protected $fillable = ['slug','title','category_id','excerpt','published','body', 'image'];
    protected $sluggable = ['build_from' => 'title','save_to' => 'slug'];
    
    function Category(){
        return $this->hasMany('Category');
    }
    
    function Category(){
        return $this->belongsTo('User');
    }

}
