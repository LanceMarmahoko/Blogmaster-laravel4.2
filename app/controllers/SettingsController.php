<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingsController extends \BaseController {

	public function edit($username){
		try {
			$user = User::with('settings')->whereUsername($username)->firstOrFail();
		} 

		catch (ModelNotFoundException $e) {
			return Redirect::home();
		}

		return View::make('settings.edit', compact('user'));
	}

	public function update_username($username){
		$input = Input::only('display_name');
		$user = User::with('settings')->whereUsername($username)->firstOrFail();
		$data = ['display_name' => $input['display_name']];
		$user->settings->fill($data)->save();
		return Redirect::back();
	}

	public function add_categories(){
		Categories::create(['name' => 'ooooo', 'slug' => 'ooooo-is-azxzndfdfother-slug']); 
	}

	public function update_categories(){
		//
	}
}