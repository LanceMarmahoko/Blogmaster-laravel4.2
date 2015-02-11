<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingsController extends \BaseController {

	public function create(){
		//
	}

	public function store(){
	}

	public function edit($username){

		try {

			$user = User::with('settings')->whereUsername($username)->firstOrFail();

		} 

		catch (ModelNotFoundException $e) {

			return Redirect::home();

		}

		return View::make('settings.edit')->withUser($user);
	}

	public function update(){
		//
	}

	public function destroy($id){
		//
	}

}