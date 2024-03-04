<?php

use App\Http\Controllers\NewsletterController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

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




Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('newsletter', NewsletterController::class);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);


//* Route::get('categories/{category:slug}', function (Category $category) {
//*     return view('posts', [
//*         'posts' => $category->posts,
//*         'currentCategory' => $category,
//*         'categories' => Category::all()
//*     ]);
//* });

/** 
 * ? the above code is commented because of PostController filtering method */


/**
 // ? also the below code is commented because of Post.php PostController.php and
 // ? other blade.php files as well.
 */

// Route::get('authors/{author:username}', function (User $author) {
//     return view('posts.index', [
//         'posts' => $author->posts,
//*         'categories' => Category::all()
//*         /*
//*         * 'posts' => $author->posts->load('category', 'author');
//*         * this could prevent the eager load but in the Post.php
//*         * there is a $with variable that does exactly that.
//*         * 
//*         * if I wanna turn them off, I can simply use tinker and
//*         * `App\Models\Post::without(['author', 'category'])->first()`
//*         */
//     ]);
// });

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store']);

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');
