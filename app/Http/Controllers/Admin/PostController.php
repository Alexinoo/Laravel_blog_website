<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{

    public function index()
    {

        return view('Admin.post.index');
    }

    public function create()
    {

        $categories = Category::where(['status' => 0])->get();

        return view('Admin.post.create', [
            'categories' => $categories
        ]);
    }
}
