<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function renderCategory ()
    {
        $category = Category::all();

        return view('admin.cat.category')->with('category', $category);
    }

    public function renderEditCategory ($id)
    {
        $category = Category::find($id);

        if(!$category) {
            return abort(404);
        }

        return view('admin.cat.categoryEdit')->with('category', $category);
    }

    public function editCategory ($id) 
    {
        $category = Category::find($id);

        if(!$category) {
            return abort(404);
        }

        $category->name = request()->get('name', $category->name);

        $category->save();

        return redirect( route('renderCategory', $category->id) );
    }

    public function renderAddCategory ()
    {
        return view('admin.cat.categoryAdd');
    }

    public function addCategory ()
    {
        $data = request()->all();
        $category = null;
        if(isset($data['name'])) {
            $category = Category::create($data);
        }
        if($category) {
            return redirect( route('renderCategory') );
        } 
        return abort(400);
    }
}
