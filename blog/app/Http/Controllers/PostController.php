<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsSuccessful;
class PostController extends Controller
{
    // the seven controller actions => index , show ,  create ,store , edit , update , destroy
    public function index(){
        // dd(Gate::allows('admin'));           method 1 to check for admin
        // dd(request()->user()->can('admin'));     method 2 to check for admin
        // $this -> authorize('admin');
        return view( 'posts.index' , [
            'posts' => Post::latest()->filter(
            request(['search','category','author'])
            )->paginate(6)->withQueryString()
        ]);
        // return view( 'posts.index' , [
        //     'posts' => Post::latest()->filter(
        //     request(['search','category','author'])
        //     )->paginate()
        // ]);
    }


    public function show(Post $post){
        // $post must be the same name as the wildcard {post}  (route model binding)
        // find a post by its slug and pass it to the view 'post'

        return view('posts.show' , ['post' => $post]);
    }

}
