<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
class PagesController extends \BaseController {

    public function __construct(){ 

        //Which controllers should be filtered?
        $this->beforeFilter('currentUser', ['only' => ['dashboard']]);
    }

    public function index(){
        //homepage prep, display published posts
        $posts = Post::wherePublish_status(true)->orderBy('id', 'DESC')->paginate(10);
        return Response::json($posts);
    }

    public function show($id){
        //show post prep
    try{
        $post = Post::with('user')->wherePublish_status(true)->findOrFail($id);
    }

    catch (ModelNotFoundException $e) {
        $error = "The Post with the id <strong>{$id}</strong> was not found!";
        return View::make('ErrorPage', compact('error'));
    }
        return View::make('posts.show', compact('post'));
}
    public function dashboard(){
        $published = Post::wherePublish_status(true)->orderBy('id', 'DESC')->paginate(10);  //pagination
        $unpublished = Post::wherePublish_status(false)->orderBy('id', 'DESC')->paginate(10);  //pagination
        $trashed = Post::onlyTrashed()->orderBy('id', 'DESC')->paginate(10);  //pagination
        return View::make('dashboard.show',compact('published', 'unpublished','trashed'));
    }

}