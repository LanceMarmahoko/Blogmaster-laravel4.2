<?php


function get_publish_status($status){
	$publish = Input::only($status);
	$publishStatus = isset($publish[$status]) ? 1 : 0;
	return $publishStatus;
}

function get_file_name($fieldname){
    if (Input::hasFile($fieldname)) {
	    $file = Input::file($fieldname);
	    $destination = '/postImages/' . Auth::user()->username . '/';
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
	    $destination = '/postImages/' . Auth::user()->username . '/';
	    $setname = str_random(6) . '_' . $file->getClientOriginalName();
	    $file->move(public_path() . $destination, $setname);
	    $filename = $destination . $setname;
        } else{
            $filename = $post->image;
        }

        return $filename;
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

function get_excerpt($get_body){
        $body = Input::all()[$get_body];
        $excerpt = Str::words($body, 70);
        return $excerpt;
}

function do_boolean_publish($post, $item, $id, $bool){
        $data = [$item => $bool];
        $do_publish = $post->fill($data)->save();
        return $do_publish;
}

function get_read_more($id,$link_string,$excerpt,$limit) {
        $read_more = strlen($excerpt) > $limit ? HTML::link($link_string, $id) : '.';
        return $read_more;
}