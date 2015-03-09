<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
class PagesController extends \BaseController {

    public function __construct(){ 

        //Which controllers should be filtered?
        $this->beforeFilter('currentUser', ['only' => ['dashboard']]);
    }

    public function index(){
        //homepage prep, display published posts
        $posts = Post::wherePublish_status(true)->orderBy('id', 'DESC');
        return Response::json($posts)->setCallback(Input::get('callback'));
    }

    public function show($id){
        $post = Post::with('user')->wherePublish_status(true)->findOrFail($id);
        return Response::json($post)->setCallback(Input::get('callback'));
}
    public function dashboard(){
        $published = Post::wherePublish_status(true)->orderBy('id', 'DESC')->paginate(10);  //pagination
        $unpublished = Post::wherePublish_status(false)->orderBy('id', 'DESC')->paginate(10);  //pagination
        $trashed = Post::onlyTrashed()->orderBy('id', 'DESC')->paginate(10);  //pagination
        return View::make('dashboard.show',compact('published', 'unpublished','trashed'));
    }

}