<?php

use Snitchdev\Validation\Post_validation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostsController extends \BaseController {

    protected $post_validation;

    public function __construct(Post_validation $post_validation){ 
        $this->post_validation = $post_validation;
        //Which controllers shouldnt be filtered?
        $this->beforeFilter('currentUser', ['except' => ['show']]);
    }
    
    public function create(){
        //prep for post creation
        $category_list = Category::lists('name', 'id');
        return View::make('posts.create',compact('category_list'));
    }

    public function edit($id){
        //prep for post edit
        $post = Post::findOrFail($id);
        $category_list = Category::lists('name', 'id');
        $publish_status = get_value('publish_status',$id,'Post'); //Helper Function
        return View::make('posts.edit', compact('post','publish_status','category_list'));
    }

    public function store(){
        $input = Input::only('title','body','category_id');
         $IsValidated = $this->post_validation->validate($input); 
            if ($IsValidated){
            $image = null !== Input::file('image') ? prepare_image('image') : get_default('category_id');
            $data = [
                'title' => $input['title'],
                'body' => $input['body'],
                'category_id' => $input['category_id'],
                'user_id' => Auth::user()->id,
                'excerpt' => get_excerpt('body'), //Helper function
                'publish_status' => get_publish_status('publish_status'),
                'image' => $image
            ];
            Post::create($data);
            Flash::success('Post created!');
            return Redirect::back();
        }
        return Redirect::back()->withInput()->withErrors();
    }

    public function update($id){

        $post = Post::whereId($id)->firstOrFail();
        $input = Input::only('title','body','category_id');
         $IsValidated = $this->post_validation->validate($input); 
        if ($IsValidated){
            $image = null !== Input::file('image') ? prepare_image('image','category_id') : get_value('image',$id,'Post');
            $data = [
                'title' => $input['title'],
                'body' => $input['body'],
                'category_id' => $input['category_id'],
                'user_id' => Auth::user()->id,
                'excerpt' => get_excerpt('body'), //Helper function
                'publish_status' => get_publish_status('publish_status'),  //Helper function
                'image' => $image
            ];
            $post->fill($data)->save();
            Flash::success('Post updated!');
            return Redirect::back();
        }
        return Redirect::back()->withInput()->withErrors();
    }

    public function publish($id){
        $post = Post::whereId($id)->firstOrFail();
        do_boolean_publish($post, 'publish_status', 1);
        Flash::success('Post published!');
        return Redirect::back();
    }

    public function unpublish($id){
        $post = Post::whereId($id)->firstOrFail();
        do_boolean_publish($post, 'publish_status', 0);
        Flash::success('Post unpublished!');
        return Redirect::back();
    }

    public function soft_delete($id){
        $post = Post::whereId($id)->firstOrFail();
        do_boolean_publish($post, 'publish_status', 0);
        $post->delete($id);
        Flash::message('Post trashed!');
        return Redirect::back();
    }

    public function restore($id){
        $post = Post::onlyTrashed($id)->firstOrFail();
        do_boolean_publish($post, 'publish_status', 0);
        $post->restore($id);
        Flash::message('Post restored!');
        return Redirect::back();
    }

    public function destroy($id){
        $post = Post::onlyTrashed($id)->firstOrFail();
        $post->forceDelete($id);
        Flash::message('Post deleted!');
        return Redirect::back();
    }

}