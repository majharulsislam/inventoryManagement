<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.category.index', compact('categories'));
    }


    public function store(Request $request)
    {
        $category = new Category();

        $category->categoryname = $request->categoryname;
        $category->save();

        $notify = array('messege' => 'Category Added Successfully!','alert-type' => 'success');
        return redirect()->route('all.category')->with($notify);
    }


    public function destroy($id)
    {
        $category = Category::find($id);

        if(!is_null($category)){
            $category->delete();
        }

        $notify = array('messege' => 'Category Deleted Successfully!','alert-type' => 'success');
        return redirect()->route('all.category')->with($notify);
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->categoryname = $request->categoryname;
        $category->save();

        $notify = array('messege' => 'Category Updated Successfully!','alert-type' => 'success');
        return redirect()->route('all.category')->with($notify);
    }

}
