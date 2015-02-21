<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingsController extends \BaseController {

	public function edit($username){
		try {
			$user = User::with('settings')->whereUsername($username)->firstOrFail();
			$category = Category::get();
		} 

		catch (ModelNotFoundException $e) {
			return Redirect::home();
		}

		

		return View::make('settings.edit', compact('user','category'));


	}

	public function update_displayname($username){
		$input = Input::only('display_name');
		$user = User::with('settings')->whereUsername($username)->firstOrFail();
		$data = ['display_name' => $input['display_name']];
		$user->settings->fill($data)->save();
		return Redirect::back();
	}
}