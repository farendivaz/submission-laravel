<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class GuestController extends Controller
{
    // FOR BLOG PAGE
    public function blogPage()
    {
        $posts = Post::with(['User'])->orderByDesc('id');
        // $post = Post::latest();
        return view("welcome",  [
            "posts" => $posts->get(),
        ]);
    }

    // FOR LOGIN PAGE
    public function aboutPage()
    {
        return view('about');
    }

    // FOR LOGIN PAGE
    public function login()
    {
        return view('auth.login');
    }

    // FOR REGISTER PAGE
    public function register()
    {
        return view('auth.register');
    }


    public function moveSingle(Post $post)
    {
        // $posts = Post::with(['User'])->find('slug');
        return view("post", compact("post"));
    }

    public function categoryPost(Category $category)
    {
        // $category_name = Category::find
        // return view("category", compact("category"));
        return view("category", [
            "title" => $category->name,
            "posts" => $category->posts,
            "category" => $category->name,
        ]);
    }
}
