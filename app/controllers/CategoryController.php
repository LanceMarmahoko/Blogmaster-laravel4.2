<?php

class CategoryController extends \BaseController {


	public function store()
	{

		$input= Input::only('category');

        $data= [
            'name' => $input['category']
        ];

        Category::create($data); 
        return Redirect::back();
	}

}
