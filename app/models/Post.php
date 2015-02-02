<?php


class Post extends Eloquent{

    protected $fillable =['user_id','title','excerpt','published','body', 'image'];
    
    function user(){
        return $this->belongsTo('User');
    }

}
