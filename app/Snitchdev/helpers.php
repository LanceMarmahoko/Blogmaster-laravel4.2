<?php

function errors_for($attribute, $errors){
    return $errors->first($attribute, '<div class="error">:message</div>');
}
function learn_about_errors_for($attribute, $errors,$details,$link){
    return $errors->first($attribute, '<div class="alert alert-warning error" role="alert"> '.$details.' <a href="'. $link .'" class="alert-link">Learn more</a></div>');
}

function get_publish_status($status){
	$publish = Input::only($status);
	$publish_status = isset($publish[$status]) ? 1 : 0;
	return $publish_status;
}

//refractor
function prepare_image($image){
    //get file, prepare Post Image and save 
    $file = Input::file($image);
    $file_name  = time() . '.' . $file->getClientOriginalExtension();
    $image_path = 'img/post_images/' . $file_name;
    Image::make($file->getRealPath())->crop(468,249,0,0)->save($image_path);  

    return $image_path;
}

function get_default($category_id){
    $id = Input::only($category_id);
    $category_name = get_value('name',$id,'category');
    $file_name = get_value('default_image',$id,'category');
    $image_path = $file_name;
    //thats it!
    return $image_path;
}

function set_default($image, $category_name){

    if (null !== Input::file($image)){

        $input = Input::only($image, $category_name);
        /*---------------------------------------------*/
        $get_name = Str::slug($input[$category_name],$separator = '-'); //use this to name image
        $file = $input[$image];
        $file_name  = $get_name . '.' .$file->getClientOriginalExtension();
        $image_path = 'img/category_images/' . $file_name;
        $thumb_image_path = 'img/category_images/category_thumbs/' . $file_name;
        /*---------------------------------------------*/
        Image::make($file->getRealPath())->crop(468,249,0,0)->save($image_path); 
        Image::make($file->getRealPath())->resize(100, null, function ($constraint) {$constraint->aspectRatio();})->crop(100, 100)->save($thumb_image_path); 

   }    

    else {
        //Dont even get to this part,use html5 validation
    }

    return $cat_image =  [$image_path, $thumb_image_path];
}


function get_value($column,$id,$model){ //expect $row_id and $column
    $settings = $model::whereId($id)->firstOrFail(); //get row where the id is eq to this $row_id and store it in $settings
    $result = $settings[$column]; //look for and find this $column
    return $result; //get_sttings_data($row_id, $column);
}

function display_name_of($username){ //expect a $username
	$user = User::with('settings')->whereUsername($username)->firstOrFail(); //find row where the username is identical to $username, also bring forth the settings accociated with this $username
	$id = $user->settings->id; //get this $username's id and store it in $row_id                              //find the 
	$result = get_value('display_name',$id,'Settings');
    return $result;
}

function get_excerpt($getBody){
    $body = Input::all()[$getBody];
    $excerpt = Str::words($body, 70);
    return $excerpt;
}

function do_boolean_publish($post, $item, $bool){
    $data = [$item => $bool];
    $do_publish = $post->fill($data)->save();
    return $do_publish;
}

function get_read_more($id,$link_string,$excerpt,$limit) {
    $read_more = strlen($excerpt) > $limit ? '...' . HTML::link($link_string, $id) : '.';
    return $read_more;
}