<?php

use Snitchdev\Validation\PostValidation;


//create post, store post, show post, edit post, update post, destroy post
class PostsController extends \BaseController {

    protected $postValidation;
    
    public function __construct(PostValidation $postValidation) { 
        $this->postValidation = $postValidation;
        $this->beforeFilter('currentUser', ['except' => ['show']]);
    }

    public function create(){
        //If you are Auth then create post
        return View::make('posts.create');
    }

    public function store(){
        //Get input before validation
        $input = Input::only('title','body');
        //Validate input
        $this->postValidation->validate($input); 
        
        //Collect and split input after validation
        $title = $input['title'];
        $body = $input['body'];  
        
        //Create excerpt
        $excerpt = Str::words($body, 70);
        
        //Create the record
        Post::create(['excerpt' => $excerpt, 'title'=> $title, 'body' => $body]);
        //redirect and show flash message?
        return Redirect::route('dashboard');
    }
        
        
        
    public function show($id){
        $post = Post::findOrFail($id);
        return View::make('posts.show', compact('post'));
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return View::make('posts.edit', compact('post'));
        
    }

    public function update($id){
        $post = Post::whereId($id)->firstOrFail();
        $input = Input::only('title','body');
        $this->postValidation->validate($input);
        $post->fill($input)->save();
        return Redirect::back();
    }

    public function destroy($id){
        return "helloWorld from destroy";
        //If we are Auth then we can destroy a post
        //First we findOrFail this post by Id
        //Destroy post
        //display flash message 
        //then redirect to index?
    }

}