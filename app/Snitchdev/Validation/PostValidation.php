<?php namespace Snitchdev\Validation;

use Laracasts\Validation\FormValidator;

class PostValidation extends FormValidator{
        
    protected $rules = [
        'title' => 'required',
        'body' => 'required',
        'category' => 'required'
    ];
}
