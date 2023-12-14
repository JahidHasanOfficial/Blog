<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('backend.pages.category.add');
      
    }


    public function manageCategory(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.category.manage', compact('categories'));
    }


    public function storeCategory(Request $request){
        $this->validate($request,[
            'name'=> 'required',
        ]);
        Category::create([
            'name'=> $request->name,
            'slug'=>Str::slug($request->name),
        ]);
        return redirect()->back()->withSuccess('Category has been created');
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('backend.pages.category.edit', compact('category'));
    }
    public function updateCategory(Request $request, $id){
        $category = Category::find($id);
        
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        
        return redirect()->back()->with('success', 'Category has been updated');
    }


    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category has been deleted');
    }
    
}
