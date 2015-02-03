<?php

use Snitchdev\Validation\PostValidation;

class PostsController extends \BaseController {

    protected $postValidation;

    public function __construct(PostValidation $postValidation) { 
        $this->postValidation = $postValidation;
        $this->beforeFilter('currentUser', ['create', 'store', 'update','destroy']);
    }

    public function create(){
        return View::make('posts.create');
    }


    public function edit($id){
        $post = Post::findOrFail($id);
        return View::make('posts.edit', compact('post'));
    }


    public function store(){
        $input = Input::only('title','body');
        $this->postValidation->validate($input);  
        $publishStatus = get_publish_status('publish');
        $filename = get_file_name('image');
        $excerpt = get_excerpt('body');

        $user_id = Auth::user()->id;

        $data = [
        'user_id' => $user_id,
        'title' => $input['title'],
        'body' => $input['body'],
        'excerpt' => $excerpt,
        'published' => $publishStatus,
        'image' => $filename
        ];
        Post::create($data);
        return Redirect::route('dashboard');
    }


    public function update($id){
        $post = Post::whereId($id)->firstOrFail();
        $input = Input::only('title','body');
        $this->postValidation->validate($input);
        $publishStatus = get_publish_status('publish');
        $excerpt = get_excerpt('body');
        $filename = update_file_name($post,'image');
        $data = [
        'image' => $filename,
        'published' => $publishStatus,
        'excerpt' => $excerpt, 
        'title'=> $input['title'], 
        'body' => $input['body']
        ];
        $post->fill($data)->save();
        return Redirect::back();
    }


    public function destroy($id){
        $post = Post::whereId($id)->firstOrFail();
        $post->destroy($id);
        return Redirect::home();
    }

    public function softDelete($id){
        $post = Post::whereId($id)->firstOrFail();
        $publishStatus = 0;
        $data = ['published' => $publishStatus];
        $post->fill($data)->save();
        $post->delete($id);
        return Redirect::home();
    }

}