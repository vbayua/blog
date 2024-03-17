<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('newsletter', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us10',
    ]);

    // dd($request->input('email'));
    try {
        $mailchimp->lists->addListMember('a966348411', [
            'email_address' => $request->input('email'),
            'status' => 'subscribed',
        ]);
    } catch (\Exception $e) {
        \Illuminate\Validation\ValidationException::withMessages(['email' => 'Email could not be added to our newsletter list']);
    }

    return redirect('/')->with('success', 'You are now signed up for our newsletter');
});
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post');

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all(),
//     ]);
// })->name('category');

// Route::get('authors/{author:username}', function (User $author) {
//     return view('posts.index', [
//         'posts' => $author->posts,
//     ]);
// });
