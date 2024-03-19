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

    public function store()
    {
        Post::create(
            array_merge($this->validatePost(), [
                'user_id' => auth()->id(),
                'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
            ]),
        );

        return redirect()->route('home')->with('success', 'Post Created');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted!');
    }

    protected function validatePost(?Post $post = null)
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => 'image',
            'excerpt' => 'required|max:255',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            // 'category_id' => 'required|exists:category, category_id'
        ]);
    }
}
