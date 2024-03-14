<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("sessions.create");
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password'=> 'required',
        ]);

        if(auth()->attempt($attributes)) {
            return redirect('/')->with('success','Welcome back!');
        }

        throw ValidationException::withMessages([
            'email' => 'provided credentials cannot be verified!'
        ]);
        // return back()->withInput()->withErrors(['email' => 'provided credentials cannot be verified!']);
    }
    public function destroy(Request $request)
    {
        auth()->logout();

        return redirect('/')->with("success","Goodbye!");
    }
}
