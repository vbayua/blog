<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view("sessions.create");
    }
    public function destroy(Request $request)
    {
        auth()->logout();

        return redirect('/')->with("success","Goodbye!");
    }
}
