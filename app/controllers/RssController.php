<?php

class RssController extends \BaseController {

	public function index(){
        $data['posts'] = Post::get();
        return Response::view('rss',$data,200,[
            'Content-Type' => 'application/atom+xml; charset=UTF-8'
        ]);
	}
}