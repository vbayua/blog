<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
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

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post'=> $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'thumbnail' => 'image',
            'excerpt' => 'required|max:255',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            // 'category_id' => 'required|exists:category, category_id'
        ]);

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        return back()->with('success','Post updated!');
    }
}
