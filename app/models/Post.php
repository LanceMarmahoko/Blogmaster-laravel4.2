<?php


class Post extends Eloquent{

    protected $fillable =['title','excerpt','published','body'];
    
    function user(){
        return $this->belongsTo('User');
    }

}
