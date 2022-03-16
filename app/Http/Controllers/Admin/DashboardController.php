<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // Count Statistics to display on Dashboard
        $nCategoriesCount = Category::count();
        $nPostsCount = Post::count();
        $nUsersCount = User::where(['role_as' => 0])->count();
        $nAdminCount = User::where(['role_as' => 1])->count();

        return view('admin.dashboard', [
            'categoriesCount' => $nCategoriesCount,
            'postsCount' => $nPostsCount,
            'usersCount' => $nUsersCount,
            'adminCount' => $nAdminCount
        ]);
    }
}
