<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();

        return view('Admin.Users.index', [
            'users' => $users
        ]);
    }

    public function edit($user_id)
    {

        $user = User::find($user_id);

        return view('Admin.Users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $user_id)
    {

        $user = User::find($user_id);

        if ($user) {
            $user->role_as = $request->role_as;

            $user->update();

            return redirect('admin/users')->with('status', 'User Updated successfully');
        }
        return redirect('admin/users')->with('status', 'No User found');
    }
}
