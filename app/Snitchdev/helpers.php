<?php


function get_publish_status($status){
	$publish = Input::only($status);
	$publishStatus = isset($publish[$status]) ? 1 : 0;
	return $publishStatus;
}

function get_file_name($fieldname){

    if (Input::hasFile($fieldname)) {
	    $file = Input::file($fieldname);
	    $destination = '/img/' . Auth::user()->username . '/';
	    $setname = str_random(6) . '_' . $file->getClientOriginalName();
	    $file->move(public_path() . $destination, $setname);
	    $filename = $destination . $setname;
	} else {
	    $filename = 'the default route';
	}

	return $filename;
}


function update_file_name($post, $fieldname){
	if (null !== Input::file($fieldname)){
	    $file = Input::file($fieldname);
	    $destination = '/img/' . Auth::user()->username . '/';
	    $setname = str_random(6) . '_' . $file->getClientOriginalName();
	    $file->move(public_path() . $destination, $setname);
	    $filename = $destination . $setname;
        } else{
            $filename = $post->image;
        }

        return $filename;
}

function get_excerpt($get_body){
        $body = Input::all()[$get_body];
        $excerpt = Str::words($body, 70);
        return $excerpt;
}