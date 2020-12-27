<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|string|min:2|max:50'
            // 'cat_name' => 'required|regex:/^\w{2,50}$/'
        ]);

        $category = new Category();
        $category->name  = $request->cat_name;
        $category->save();
        
        return response($request->all());
    }
}
