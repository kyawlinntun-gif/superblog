<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user','category')->get();
        return response()->json([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response($request->all());

        $request->validate([
            'title' => 'required|string|min:2|max:50',
            'description' => 'required|string|min:10|max:100',
            'photo' => 'required|string',
            'cat_id' => 'required|exists:categories,id',
            // 'comment_id' => 'required|exists:comments,id',
            // 'user_id' => 'required|exists:users,id'
        ]);

        // Get image type
        $strpos = strpos($request->photo, ';');
        $substr = substr($request->photo, 0, $strpos);
        $explode = explode('/', $substr)[1];

        if($explode === 'png' or $explode === 'jpeg')
        {
            // Dynamic name
            $name = time() . '.' . $explode;

            // Storage path
            $upload_path = public_path() . "/uploadimage/";

            // Change image size with image intervention
            $image = Image::make($request->photo)->resize(200, 200);

            // Save image with dynamic name
            $image->save($upload_path . $name);

            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->photo = $name;
            $post->cat_id = $request->cat_id;
            $post->user_id = Auth::id();
            $post->comment_id = 1;
            $post->save();
        }

        return response(null);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $image_path = public_path() . '/uploadimage/';

        $image = $image_path . $post->photo;

        if(file_exists($image))
        {
            unlink($image);
        }

        $post->delete();

        return response(null);
    }
}
