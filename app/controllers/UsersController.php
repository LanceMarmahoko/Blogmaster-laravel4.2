<?php

use Snitchdev\Validation\User_reg_validation;

//create a user, store the user, destroy the user
class UsersController extends \BaseController {
    
    protected $user_reg_validation;
    
    public function __construct(User_reg_validation $user_reg_validation) {
        $this->user_reg_validation = $user_reg_validation;
    }
      public function create(){
       return View::make('users.create');
   }
  
    public function store(){
        $input = Input::only('username','email','password','password_confirmation');
        $IsValidated = $this->user_reg_validation->validate($input);
        if ($IsValidated){
            User::create($input); 
            $get_user = User::whereUsername($input['username'])->first();
            Settings::create(['user_id' => $get_user->id]); 
            return Redirect::route('login');       
        }
        return Redirect::back()->withInput()->withErrors();

    }

}