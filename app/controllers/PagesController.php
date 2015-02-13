<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pages
	 *
	 * @return Response 
	 */
    public function __construct() { 
        $this->beforeFilter('currentUser', ['only' => ['dashboard']]);
    }

    public function index(){
        $posts = Post::wherePublished(true)->orderBy('id', 'DESC')->get();
        return View::make('index',compact('posts'));
    }


    public function dashboard(){
        $published = Post::wherePublished(true)->orderBy('id', 'DESC')->get();
        $unpublished = Post::wherePublished(false)->orderBy('id', 'DESC')->get();
        $trashed = Post::onlyTrashed()->orderBy('id', 'DESC')->get();
        return View::make('dashboard.show',compact('published', 'unpublished','trashed'));
    }

}