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
        $posts = Post::wherePublished(true)->with('user')->orderBy('id', 'DESC')->get();
        return View::make('index',compact('posts'));
    }

    public function show($id){
        $post = Post::wherePublished(true)->with('user')->findOrFail($id);
        return View::make('posts.show', compact('post'));
    }

    public function dashboard(){
        //User sees posts
        $published = Post::wherePublished(true)->orderBy('id', 'DESC')->get();
        $unpublished = Post::wherePublished(false)->orderBy('id', 'DESC')->get();
        return View::make('dashboard.show',compact('published', 'unpublished'));
    }

}