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
            'username' => 'required|max:100|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255|min:7'
        ]);

        User::create($attributes);

        return redirect('/');
    }
}
