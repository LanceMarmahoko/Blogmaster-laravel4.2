<?php

use Snitchdev\Validation\SessionValidation;

//create login page,store sessions, destroy sessions
class SessionsController extends \BaseController {

    protected $sessionValidation;
    
    public function __construct(SessionValidation $sessionValidation) {
        $this->sessionValidation = $sessionValidation;
    }
    
    public function create(){
        return View::make('sessions.create');
    }

    public function store(){
        $input = Input::only('email','password');
        $this->sessionValidation->validate($input);
        
        if (Auth::attempt($input)){
            return Redirect::route('dashboard');
        } 
    }

    public function destroy(){
        Auth::logout();
        return Redirect::route('home');
    }

}