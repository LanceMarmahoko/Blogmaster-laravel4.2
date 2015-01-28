<?php namespace Snitchdev\Validation;

use Laracasts\Validation\FormValidator;

class UserRegValidation extends FormValidator{
        
    protected $rules = [
        'username' => 'required',
        'email'    => 'required', 
        'password' => 'required|confirmed'
    ];
}
