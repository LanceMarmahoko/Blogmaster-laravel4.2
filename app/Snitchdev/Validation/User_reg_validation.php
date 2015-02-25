<?php namespace Snitchdev\Validation;

use Laracasts\Validation\FormValidator;

class User_reg_validation extends FormValidator{
        
    protected $rules = [
        'username' => 'required|unique:users',
        'email'    => 'required|unique:users', 
        'password' => 'required|confirmed'
    ];
}
