<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsLetterController;
use App\Models\Post ;
use App\Models\Category ;
use App\Models\User ;
use App\Services\NewsLetter;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Symfony\Component\Yaml\Yaml;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use \MailchimpMarketing\ApiClient;
use \MailchimpMarketing\Ping;
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

Route::get('/', [PostController::class , 'index'])->name('Home');

Route::get('posts/{post:slug}', [PostController::class , 'show']);
#->where('post','[A-z_\-]+'); using regular expression on slug constraints
Route::post('posts/{post:slug}/comments',[PostCommentsController::class ,'store']);
Route::get('register',[RegisterController::class ,'create'])->middleware('guest');
Route::Post('register',[RegisterController::class ,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::Post('login',[SessionsController::class,'store'])->middleware('guest');
Route::Post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::post('newsletter', NewsLetterController::class);


//    Admin
Route::middleware('can:admin')->group(function(){
    Route::resource('admin/posts',AdminPostController::class)->except('show');
    // Route::get('admin/posts/create',[AdminPostController::class,'create']);
    // Route::post('admin/posts',[AdminPostController::class,'store']);
    // Route::get('admin/posts',[AdminPostController::class,'index']);
    // Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit']);
    // Route::patch('admin/posts/{post}',[AdminPostController::class,'update']);
    // Route::delete('admin/posts/{post}',[AdminPostController::class,'destroy']);
});




// Route::get('categories/{category:slug}', function (Category $category) { // $category must be the same name as the wildcard {category}  (route model binding)

// return view( 'posts' , [
//     'posts' => $category -> posts,
//     'currentCategory' => $category,
//     'categories' => Category::all()
// ]);

// })->name('category');


// Route::get('authors/{author:username}', function (User $author) {    // $category must be the same name as the wildcard {category}  (route model binding)

// return view( 'posts.index' , [
//     'posts' => $author -> posts
//     ]);

// });
