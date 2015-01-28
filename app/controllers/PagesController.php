<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pages
	 *
	 * @return Response 
	 */

    public function index(){
        $posts = Post::orderBy('id', 'DESC')->get();
        return View::make('index',compact('posts', 'updated'));
    }

    public function dashboard(){
        //User sees posts
        $posts = Post::orderBy('id', 'DESC')->get();
        return View::make('dashboard.show',compact('posts'));
    }

}