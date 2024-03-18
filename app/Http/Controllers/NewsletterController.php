<?php

namespace App\Http\Controllers;

use App\Services\NewsletterInterface as Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // dd($request->input('email'));
        try {
            $newsletter->subscribe((string) $request->email);
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['email' => 'Email could not be added to our newsletter list']);
        }

        return redirect('/')->with('success', 'You are now signed up for our newsletter');
    }
}
