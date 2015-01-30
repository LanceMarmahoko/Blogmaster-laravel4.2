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

        $publish = Input::get('publish');
        /*********REPEATED AREA**********************************************/
        $title = $input['title'];
        $body = $input['body'];
        $excerpt = Str::words($body, 70);
        $booleanPublish = isset($publish['publish']) ? 1 : 0;
        $data = ['published' => $booleanPublish,'excerpt' => $excerpt, 'title'=> $title, 'body' => $body];
        /********************************************************************/

        //Create the record
        Post::create($data);
        //redirect and show flash message?
        return Redirect::route('dashboard');
    }
        
    public function show($id){
        $post = Post::wherePublished(true)->findOrFail($id);
        return View::make('posts.show', compact('post'));
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return View::make('posts.edit', compact('post'));
        
    }

    public function update($id){
        $input = Input::only('title','body');
        $this->postValidation->validate($input);

        $publish = Input::only('published');
        $booleanPublish = isset($publish['published']) ? 1 : 0;
        // dd($booleanPublish);
        /*********REPEATED AREA**********************************************/
        $title = $input['title'];
        $body = $input['body'];
        $excerpt = Str::words($body, 70);
        $data = ['published' => $booleanPublish,'excerpt' => $excerpt, 'title'=> $title, 'body' => $body];
        /********************************************************************/
        //check input checkbox exists, if yes try publish() otherwise unpublish()
        //now check isset the check box just so we dont bank null, can either be 1 or 0 
        // ..this is just so we know on the front end

        $post = Post::whereId($id)->firstOrFail();
        $post->fill($data)->save();
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