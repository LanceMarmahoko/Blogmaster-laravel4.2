<?php

use Snitchdev\Validation\PostValidation;

class PostsController extends \BaseController {

    protected $postValidation;

    public function __construct(PostValidation $postValidation) { 
        $this->postValidation = $postValidation;
        $this->beforeFilter('currentUser', ['create', 'store', 'update','destroy']);
    }

    public function show($id){
        $post = Post::with('user')->wherePublished(true)->findOrFail($id);
        $username = $post->user->username;
        $display_name = display_name_of($username);

        if($display_name == ""){
            $author =  $username;
        } else{
            $author =  $display_name;
        }

        return View::make('posts.show', compact('post','author'));
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
        return Redirect::back();
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

    public function publish($id){
        $post = Post::whereId($id)->firstOrFail();
        do_boolean_publish($post, 'published', $id, 1);
        return Redirect::back();
    }

    public function unpublish($id){
        $post = Post::whereId($id)->firstOrFail();
        do_boolean_publish($post, 'published', $id, 0);
        return Redirect::back();
    }

    public function softDelete($id){
        $post = Post::whereId($id)->firstOrFail();
        do_boolean_publish($post, 'published', $id, 0);
        $post->delete($id);
        return Redirect::back();
    }

    public function restore($id){
        $post = Post::onlyTrashed($id)->firstOrFail();
        do_boolean_publish($post, 'published', $id, 0);
        $post->restore($id);
        return Redirect::back();
    }

    public function destroy($id){
        $post = Post::onlyTrashed($id)->firstOrFail();
        $post->forceDelete($id);
        return Redirect::back();
    }

}