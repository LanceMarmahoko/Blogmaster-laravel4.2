<?php

use Snitchdev\Validation\Session_validation;

//create login page,store sessions, destroy sessions
class SessionsController extends \BaseController {

    protected $session_validation;
    
    public function __construct(Session_validation $session_validation) {
        $this->session_validation = $session_validation;
    }
    
    public function create(){
        return View::make('sessions.create');
    }

    public function store(){
     
        $input = Input::only('email','password');
         $IsValidated = $this->session_validation->validate($input); 
            if ($IsValidated){
                if (Auth::attempt($input)){
                    Flash::success('You are logged in!');
                    return Redirect::intended('/dashboard');
                } 

            Flash::error('Your credentials are invalid!');
            return Redirect::back()->withInput();
        }
        return Redirect::back()->withInput()->withErrors();
    }

    public function destroy(){
        Auth::logout();
        Flash::warning('You are now logged out!');
        return Redirect::route('home');
    }

}