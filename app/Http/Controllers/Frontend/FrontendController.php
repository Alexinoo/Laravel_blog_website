<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        return view('Frontend.index');
    }


    public function viewCategoryPost(string $category_slug)
    {

        $category = Category::where(['slug' => $category_slug, 'status' => 0])->first();

        if ($category) {

            $posts = Post::where(['category_id' => $category->id, 'status' => 0])->paginate(2);

            return view('Frontend.post.index', ['posts' => $posts, 'category' => $category]);
        } else {
            return redirect('/');
        }
    }

    public function viewPost(string $category_slug, string $post_slug)
    {
        $category = Category::where(['slug' => $category_slug, 'status' => 0])->first();

        if ($category) {

            $post = Post::where(['category_id' => $category->id, 'slug' =>  $post_slug])->first();

            // View Latest post - orderBy function ->orderBy('created_at' , 'ASC')
            //Also take 2/3 records - Available records - 3 
            $latest_posts = Post::where(['category_id' => $category->id])->orderBy('created_at', 'DESC')->get()->take(10);

            return view('Frontend.post.view', ['post' => $post, 'latest_posts' =>  $latest_posts]);
        } else {
            return redirect('/');
        }
    }
}
