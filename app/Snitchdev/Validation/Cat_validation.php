<?php namespace Snitchdev\Validation;

use Laracasts\Validation\FormValidator;

class Cat_validation extends FormValidator{
        
    protected $rules = [
        'category' 	=> 'required',
        'image'		=>	'required'
    ];
}
