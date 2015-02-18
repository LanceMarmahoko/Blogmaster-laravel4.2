<?php

use Snitchdev\Validation\UserRegValidation;

//create a user, store the user, destroy the user
class UsersController extends \BaseController {
    
    protected $userRegValidation;
    
    public function __construct(UserRegValidation $userRegValidation) {
        $this->userRegValidation = $userRegValidation;
    }
   
    public function create(){
        //create the register form
        return View::make('users.create');
    }
   
    public function edit($username){
        return 'this is your profile';
    }
   
    public function update(){
        //update the user
    }

    public function store(){
        //store the input in $var
        $input = Input::only('username','email','password','password_confirmation');
        //Validate $var
        $this->userRegValidation->validate($input);
        //create record using validated $var
        User::create($input); 
        $get_user = User::whereEmail($input['email'])->first();
        Settings::create(['user_id' => $get_user->id]); 
        //redirect to login
        return Redirect::route('login');
    }

}