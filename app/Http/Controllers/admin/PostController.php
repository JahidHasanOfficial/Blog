<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function PHPUnit\Framework\fileExists;

class PostController extends Controller
{
    public function addPost(){
        $categories = Category::orderBy("id","desc")->get();
        return view('backend.pages.post.add',compact('categories'));
    }
    public function storePost(Request $request){
        $this->validate($request,[
            'title'=> 'required',
            'category_id'=> 'required',
            'short_description'=> 'required',
            'long_description'=> 'required',
            'image'=> 'required',
        ]);
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('post', $imageName);

        Post::create([
            'title'=> $request->title,
            'category_id'=> $request->category_id,
            'slug'=> Str::slug($request->title),
            'short_description' =>$request->short_description,
            'long_description' =>$request->long_description,
            'image' => $imageName,
        ]);
        return redirect()->back()->withSuccess('Post has been created');
    }



    public function managePost(){
        $posts = Post::orderBy("id","desc")->get();
        return view('backend.pages.post.manage',compact('posts'));
    }


    public function editPost($id){
        $post = Post::find($id);
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.pages.post.edit', compact('post','categories'));
    }


    public function updatePost(Request $request, $id){
        $this->validate($request,[
            'title'=> 'required',
            'category_id'=> 'required',
            'short_description'=> 'required',
            'long_description'=> 'required',
        ]);
        $post = Post::find($id);
        if( $request->hasFile('image') ){
            if($post->image && file_exists('post'. $post->image )){
                unlink('post'. $post->image);
            }
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('post', $imageName);
            $post->image = $imageName;
        }
       

        $post->update([
            'title'=> $request->title,
            'category_id'=> $request->category_id,
            'slug'=> Str::slug($request->title),
            'short_description' =>$request->short_description,
            'long_description' =>$request->long_description,
        ]);
        return redirect()->back()->withSuccess('Post has been Updated');
    }

    public function deletePost($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->withSuccess('Post has been Delete Success');
    }
}
