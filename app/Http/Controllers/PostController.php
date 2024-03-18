<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

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
        // dd($request->file('thumbnail')->store(''));
        $attributes = $request->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => 'image',
            'excerpt' => 'required|max:255',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            // 'category_id' => 'required|exists:category, category_id'
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect()->route('home')->with('success', '');
    }
}
