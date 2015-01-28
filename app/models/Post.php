<?php


class Post extends Eloquent{

    protected $fillable =['title','excerpt','body'];
    
    function user(){
        return $this->belongsTo('User');
    }

}
