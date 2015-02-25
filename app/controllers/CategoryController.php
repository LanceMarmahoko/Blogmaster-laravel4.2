<?php

use Snitchdev\Validation\Cat_validation;

class CategoryController extends \BaseController {

    protected $cat_validation;

    public function __construct(Cat_validation $cat_validation){ 
        $this->cat_validation = $cat_validation;
    }


	public function store(){ //validation

		$input = Input::only('category','image');

		$IsValidated = $this->cat_validation->validate($input);

        if ($IsValidated){
			$cat_image = set_default('image', 'category');
			$cat_name = $input['category'];
	        $data = [
	        	'name' => $cat_name,
		        'default_image' => $cat_image[0],
		        'thumbnail' =>	$cat_image[1]
	        ];
	        Category::create($data); 
	        Flash::success('Success! The default image for <strong>' . $cat_name.  '</strong> has been set!');
	        return Redirect::back();
        } 

	}

}
