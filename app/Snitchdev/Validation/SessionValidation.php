<?php namespace Snitchdev\Validation;

use Laracasts\Validation\FormValidator;

class SessionValidation extends FormValidator{
        
    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];
}
