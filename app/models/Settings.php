<?php

class Settings extends \Eloquent {

	protected $table = 'settings';
	protected $fillable = ['user_id','display_name'];

    function user(){
        return $this->belongsTo('User');
    }
    
}