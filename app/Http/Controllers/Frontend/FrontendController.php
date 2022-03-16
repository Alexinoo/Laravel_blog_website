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


    public function viewCategoryPost($category_slug)
    {

        $category = Category::where([
            'slug' => $category_slug,
            'status' => 0
        ])->first();

        if ($category) {

            $posts = Post::where([
                'category_id' => $category->id,
                'status' => 0
            ])->paginate(2);

            return view('Frontend.post.index', [
                'posts' => $posts,
                'category' => $category
            ]);
        } else {
            return redirect('/');
        }
    }
}
