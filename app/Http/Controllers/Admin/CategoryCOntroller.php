<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        return view('Admin.Category.index');
    }

    public function create(){

        return view('Admin.Category.create');
    }

    public function store(CategoryFormRequest $request){


        return $request->input();
    }
}
