<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent implements SluggableInterface{

    use SluggableTrait;
	use SoftDeletingTrait;

    protected $table = 'posts';
    protected $fillable = ['user_id','slug','category','title','excerpt','published','body', 'image'];
    protected $sluggable = ['build_from' => 'title','save_to' => 'slug'];
    
    function user(){
        return $this->belongsTo('User');
    }


}
