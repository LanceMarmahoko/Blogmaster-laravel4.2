<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Category extends \Eloquent{

    use SluggableTrait;
	use SoftDeletingTrait;
	
	protected $table = 'categories';
	protected $fillable = ['name', 'slug'];

    public function post(){
        return $this->hasMany('Post');
    }

}
