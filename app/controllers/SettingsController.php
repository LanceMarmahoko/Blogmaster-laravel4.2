<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Snitchdev\Validation\Display_name_validation;

class SettingsController extends \BaseController {


    protected $display_name_validation;
    
    public function __construct(Display_name_validation $display_name_validation) {
        $this->display_name_validation = $display_name_validation;
    }
    
	public function edit($username){
		
	try {
		$user = User::with('settings')->whereUsername($username)->firstOrFail();
		$category = Category::get();
	} 

	catch (ModelNotFoundException $e) {
		$error = "The user with the username <strong>{$username}</strong> was not found!";
		return View::make('ErrorPage', compact('error'));
	}
		
		return View::make('settings.edit', compact('user','category'));
	}

	public function update_display_name($username){
		$input = Input::only('display_name');
		$user = User::with('settings')->whereUsername($username)->firstOrFail();
		$IsValidated = $this->display_name_validation->validate($input); 
		if ($IsValidated){
			$data = ['display_name' => $input['display_name']];
			$user->settings->fill($data)->save();
			Flash::success('Display name added!!');
			return Redirect::back();
		}
		return Redirect::back()->withInput()->withErrors();
	}
}