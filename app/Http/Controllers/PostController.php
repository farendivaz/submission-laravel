<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.add_post', compact('categories', 'tags'));
    }

    public function blogPage()
    {
        $posts = Post::with(['User', 'Tag'])->orderByDesc('id');
        // $post = Post::latest();
        return view("welcome",  [
            "posts" => $posts->get(),
        ]);
    }
    // DASHBOARD DATA
    public function dashboard()
    {
        $mostUsedCategory = DB::table('posts')
                            ->select('category_id', DB::raw('count(*) as category_count'))
                            ->where('user_id', Auth::id())
                            ->groupBy('category_id')
                            ->orderByDesc('category_count')
                            ->first();

        if ($mostUsedCategory) {
            $categoryId = $mostUsedCategory->category_id;
            $categoryCount = $mostUsedCategory->category_count;

            // Retrieve the category model for the most used category
            $mostUsedCategoryModel = Category::find($categoryId);
        } else {
            // Handle the case where the author has no posts or no distinct categories
            $categoryId = null;
            $categoryCount = 0;
            $mostUsedCategoryModel = null;
        }
        $user_id = Auth::id();
        $posts = Post::all()->where('user_id', $user_id);
        $user = User::find($user_id);
        // dd($mostUsedCategoryModel);
        // $name = $user_id->name;

        return view('admin.dashboard', compact('user', 'posts', 'mostUsedCategoryModel'));
    }

    // INSERT DATA
    public function insertData(Request $req)
    {
        $req->validate([
            'title' => 'required | string | max:255',
            'excerpt' => 'required | string',
            'body' => 'required | string',
            'tag' => 'required',
            'category' => 'required',
        ]);

         // ID FOR AUTHENTICATED USER
         $user_id = auth()->id();

        $post = Post::create([
            'title' => $req->title,
            'body' => $req->body,
            'excerpt' => $req->excerpt,
            'slug' => join('-', explode(' ', strtolower($req->title))),
            'category_id' => $req->category,
            'user_id' => $user_id,
        ]);

        $post->tags()->attach($req->tag);

         return redirect()->route('view.posts');
    }

    // FOR MOVING TO POSTS PAGE
    public function movePosts()
    {
        $user_id = Auth::id();

        $posts = Post::with('Category')
                    ->where('user_id', $user_id)
                    ->orderBy('id','DESC')
                    ->paginate(15);
        // dd($posts);
        return view('admin.posts',compact('posts'));
    }

    public function updateData(Request $req, string $id, string $category_id)
    {
        $category_name = '';
        // $image_name = '';

        $req->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required | string',
            'body' => 'required|string',
        ]);

        // // IF USER SELECTS IMAGE
        // if($req->file('image'))
        // {
        //     $image_name = $req->file('image')->getClientOriginalName();

        //     $req->file('image')->storeAs('images',$image_name,'public');

        //     Storage::disk('public')->delete('images/'.$req->input('hidden_image'));
        // }
        // else
        // {
        //     $image_name = $req->input('hidden_image');
        // }

        // IF USER SELECTS CATEGORY
        if($req->category != 'Select Category')
        {
            $category_name = $req->category;
        }
        else
        {
            $category_name = $category_id;
        }


        // UPDATING RECORD
        $data = DB::table('posts')
                ->where('id',$id)
                ->update([
                    'title' => $req->title,
                    'slug' => join('-', explode(' ', strtolower($req->title))),
                    'excerpt' => $req->excerpt,
                    'body' => $req->body,
                    // 'post_img' => $image_name,
                    'category_id' => $category_name,
                    'user_id' => Auth::id(),
                    'updated_at' => now(),
                ]);
        if($data)
            return redirect()->route('view.posts');
    }

    public function moveUpdatePost(string $id)
    {
        $post = Post::with('Category')->find($id);
        $categories = Category::all();

        return view('admin.update_post',compact(['post','categories']));
    }

    // DELETE POST
    public function deleteData(string $id, string $category_id)
    {
         // ID FOR AUTHENTICATED USER
         $user_id = Auth::id();

         $data = Post::find($id);
         $data->delete();

         $category = Category::find($category_id);
         $user = User::find($user_id);

        //  DB::table('categories')
        //      ->where('id',$category_id)
        //      ->update([
        //          'post_count' => ($category->post_count - 1),
        //      ]);

        //  DB::table('authors')
        //  ->where('id',$user->id)
        //  ->update([
        //      'post_count' => ($authors->post_count - 1),
        //  ]);

        //  Storage::disk('public')->delete('images/'.$data->post_img);

         return redirect()->route('view.posts');
    }

}
