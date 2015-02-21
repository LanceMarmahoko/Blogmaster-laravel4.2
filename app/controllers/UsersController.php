<?php

use Snitchdev\Validation\UserRegValidation;

//create a user, store the user, destroy the user
class UsersController extends \BaseController {
    
    protected $userRegValidation;
    
    public function __construct(UserRegValidation $userRegValidation) {
        $this->userRegValidation = $userRegValidation;
    }
   
    public function create(){
        return View::make('users.create');
    }
   
    public function edit($username){
        return 'this is your profile';
    }
   
    public function update(){
    }

    public function store(){
        $input = Input::only('username','email','password','password_confirmation');
        $this->userRegValidation->validate($input);
        User::create($input); 
        
        $get_user = User::whereUsername($input['username'])->first();
        Settings::create(['user_id' => $get_user->id]); 
        return Redirect::route('login');
    }

}