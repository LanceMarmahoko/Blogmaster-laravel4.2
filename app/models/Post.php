<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent implements SluggableInterface{

    use SluggableTrait;
	use SoftDeletingTrait;

    protected $table = 'posts';
    protected $sluggable = ['build_from' => 'title','save_to' => 'slug'];
    protected $fillable = ['user_id','slug','title','excerpt','published','body', 'image'];
    
    function user(){
        return $this->belongsTo('User');
    }

    public function category(){
        return $this->belongsTo('Category');
    }
}
