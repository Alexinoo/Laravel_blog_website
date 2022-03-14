<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(){

        return view('Admin.post.index');
    }

    public function create(){

        return view('Admin.post.create');
    }
}
