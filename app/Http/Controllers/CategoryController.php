<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function show($id)
    {   
        $category = Category::find($id);
        return response()->json([
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|string|min:2|max:50'
            // 'cat_name' => 'required|regex:/^\w{2,50}$/g'
        ]);

        $category = new Category();
        $category->name  = $request->cat_name;
        $category->save();
        
        return response($request->all());
    }

    public function update(Request $request, $id)
    {
        // return response()->json([
        //     'id' => $id,
        //     'cat_name' => $request->cat_name
        // ]);

        $request->validate([
            'cat_name' => 'required|string|min:2|max:50'
            // 'cat_name' => 'required|regex:/^\w{2,50}$/g'
        ]);

        $category = Category::find($id);
        $category->name  = $request->cat_name;
        $category->update();
        
        return response(null);
    }

    public function destory($id)
    {
        // return response($id);
        $category = Category::find($id);
        $category->delete();

        return response(null);
    }
}
