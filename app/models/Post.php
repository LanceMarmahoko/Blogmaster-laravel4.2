<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent{

    use SoftDeletingTrait;
    protected $table = 'posts';

    protected $fillable =['user_id','title','excerpt','published','body', 'image'];
    
    function user(){
        return $this->belongsTo('User');
    }

}
