<?php

class RssController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /rss
	 *
	 * @return Response
	 */
	public function index()
	{
            $data['posts'] = Post::get();
            return Response::view('rss',$data,200,[
                'Content-Type' => 'application/atom+xml; charset=UTF-8'
            ]);
	}


}