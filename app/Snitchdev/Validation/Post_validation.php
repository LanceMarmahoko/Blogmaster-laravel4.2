<?php namespace Snitchdev\Validation;

use Laracasts\Validation\FormValidator;

class Post_validation extends FormValidator{
        
    protected $rules = [
        'title' => 'required',
        'body' => 'required'
    ];
}
