<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->get();
        return view('frontend.home.index',compact('posts'));
    }
    public function postDetails($id){
      $postDetails = Post::with('comments')->find($id);
        return view('frontend.home.post-details', compact('postDetails'));
    }
    
    

    public function postComment(Request $request, $id){
        comment::create([
            'post_id' => $id,
            'name' => $request->name,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success','Comment your successfully');
    }
}
