<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }
    public function show(Post $post)
    {
        // dd($id);
        // Post::findOrFail($id);
        return view('blog-post', ['post' => $post]);
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {
        // auth()->user();
        // dd(request()->all());
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            // 'post_image'=>'mimes:jpeg,png,bmp'
            'post_image' => 'file',
            'body' => 'required'

        ]);
        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images'); //filesystemで設定されいてるpathの直下にimagesというフォルダを作りそのなかにimageファイルを格納する(デフォルトだとstorage直下に生成)
        }

        // dd($request->post_image);

        auth()->user()->posts()->create($inputs);
        return back();
    }
}
