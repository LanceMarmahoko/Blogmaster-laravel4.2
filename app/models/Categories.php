<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Categories extends \Eloquent{

    use SluggableTrait;

	protected $table = 'categories';
    protected $sluggable = ['build_from' => 'name','save_to' => 'slug'];
	protected $fillable = ['name', 'slug'];

    public function post(){
        return $this->hasMany('Post');
    }
}
