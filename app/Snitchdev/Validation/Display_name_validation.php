<?php namespace Snitchdev\Validation;

use Laracasts\Validation\FormValidator;

class Display_name_validation extends FormValidator{
        
    protected $rules = [
        'display_name' 	=> 'unique:settings'
    ];
}
