<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // create user
        // to debug: return request()->all()

        $attributes = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:100|unique:users,username|min:3',
            // 'username' => ['required', 'max:100', 'min:3', Rule::unique('users', 'username')],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:7',
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        // session()->flash('success', 'Your account has been created');
        return redirect('/')->with('success', 'Your account has been created');
    }
}
