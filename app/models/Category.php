<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Category extends \Eloquent implements SluggableInterface{

    use SluggableTrait;

	protected $table = 'category';
	protected $fillable = ['name', 'slug'];
    protected $sluggable = ['build_from' => 'name','save_to' => 'slug'];

    public function post(){
        return $this->belongsToMany('Post');
    }
}