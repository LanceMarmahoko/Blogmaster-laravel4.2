<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $fillable = ['username','email','password'];

	protected $hidden = array('password', 'remember_token');

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }

    function post(){
        return $this->hasMany('Post');
    }

    function settings(){
        return $this->hasOne('Settings');
    }
}
