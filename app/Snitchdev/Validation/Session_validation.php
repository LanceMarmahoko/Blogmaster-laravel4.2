<?php namespace Snitchdev\Validation;

use Laracasts\Validation\FormValidator;

class Session_validation extends FormValidator{
        
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];
}
