<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    //

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = Post::create($attributes);

        return redirect()->route('home')->with('success', '');
    }
}
