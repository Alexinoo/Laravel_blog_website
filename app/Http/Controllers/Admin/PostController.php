<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::all();

        return view('Admin.post.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {

        $categories = Category::where(['status' => 0])->get();

        return view('Admin.post.create', [
            'categories' => $categories
        ]);
    }
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $model = new Post;

        $model->category_id = $data['category_id'];
        $model->name = $data['name'];

        $model->slug = Str::slug($data['slug']);

        $model->description = $data['description'];
        $model->yt_iframe = $data['yt_iframe'];
        $model->meta_title = $data['meta_title'];
        $model->meta_description = $data['meta_description'];
        $model->meta_keyword = $data['meta_keyword'];
        $model->status = $request->status == true ? 1 : 0;
        $model->created_by = $request->created_by = Auth::user()->id;
        $model->save();

        return redirect('admin/posts')->with('status', 'Post Added Successfully');
    }

    public function edit($post_id)
    {

        $post = Post::find($post_id);

        $categories = Category::where(['status' => 0])->get();

        return view('Admin.post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();

        $model =  Post::find($post_id);

        $model->category_id = $data['category_id'];
        $model->name = $data['name'];

        $model->slug = Str::slug($data['slug']);

        $model->description = $data['description'];
        $model->yt_iframe = $data['yt_iframe'];
        $model->meta_title = $data['meta_title'];
        $model->meta_description = $data['meta_description'];
        $model->meta_keyword = $data['meta_keyword'];
        $model->status = $request->status == true ? 1 : 0;
        $model->created_by = $request->created_by = Auth::user()->id;
        $model->update();

        return redirect('admin/posts')->with('status', 'Post Updated Successfully');
    }

    public function destroy($post_id)
    {

        $post = Post::find($post_id);

        $post->delete();

        return redirect('admin/posts')->with('status', 'Post Deleted Successfully');
    }
}
