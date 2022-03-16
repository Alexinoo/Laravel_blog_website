<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function index()
  {

    $categories = Category::all();

    return view('Admin.Category.index', [
      'categories' =>  $categories
    ]);
  }

  public function create()
  {

    return view('Admin.Category.create');
  }

  public function store(CategoryFormRequest $request)
  {
    // Fetch validated data
    $data  = $request->validated();
    // Bring in the Model
    $model = new Category;
    // Fetch validated data and store
    $model->name = $data['name'];
    $model->slug = Str::slug($data['slug']);
    $model->description = $data['description'];

    //Slightly different with image - Check if $data has file of type image

    if ($request->hasfile('image')) {
      // if so store in variable file
      $file = $request->file('image');
      // get file extension
      $filename = time() . '.' . $file->getClientOriginalExtension();
      //Use move() to upload the file in the uploads folder
      //Takes 2 parameters - ( location , filename )
      $file->move('uploads/category/', $filename);
      //Save the filename in the db
      $model->image = $filename;
    }
    //Get the rest of the fields
    $model->meta_title = $data['meta_title'];
    $model->meta_description = $data['meta_description'];
    $model->meta_keyword = $data['meta_keyword'];

    $model->navbar_status = $request->navbar_status == true ? 1 : 0;
    $model->status = $request->status == true ? 1 : 0;
    $model->created_by = Auth::user()->id;

    //   Save data into table categories
    $model->save();

    return redirect('admin/category')->with('status', 'Category Added Successfully');
  }

  public function edit($id)
  {

    $category = Category::find($id);
    return view('Admin.Category.edit', [
      'category' => $category
    ]);
  }

  public function update(CategoryFormRequest $request, $category_id)
  {

    // Fetch validated data
    $data  = $request->validated();
    // Bring in the Model
    $model = Category::find($category_id);
    // Fetch validated data and store
    $model->name = $data['name'];
    $model->slug = Str::slug($data['slug']);
    $model->description = $data['description'];

    //LOGIC - Delete from destination and upload a new image

    if ($request->hasfile('image')) {

      $destination = 'uploads/category/' . $model->image;

      // /Check if image exists in the destination folder
      if (File::exists($destination)) {

        // IF SO - DELETE
        File::delete($destination);
      }

      //PROCEED WITH THE UPLOAD

      $file = $request->file('image');
      // get file extension
      $filename = time() . '.' . $file->getClientOriginalExtension();
      //Use move() to upload the file in the uploads folder
      //Takes 2 parameters - ( location , filename )
      $file->move('uploads/category/', $filename);
      //Save the filename in the db
      $model->image = $filename;
    }
    //Get the rest of the fields
    $model->meta_title = $data['meta_title'];
    $model->meta_description = $data['meta_description'];
    $model->meta_keyword = $data['meta_keyword'];

    $model->navbar_status = $request->navbar_status == true ? 1 : 0;

    $model->status = $request->status == true ? 1 : 0;
    $model->created_by = Auth::user()->id;

    //   Save data into table categories
    $model->update();

    return redirect('admin/category')->with('status', 'Category Updated Successfully');
  }

  // Modified to use Modal delete confirmation

  public function destroy(Request $request)
  {

    $category = Category::find($request->category_delete_id);

    if ($category) {
      $category->delete();

      $destination = 'uploads/category/' . $category->image;
      // /Check if image exists in the destination folder
      if (File::exists($destination)) {
        // IF SO - DELETE
        File::delete($destination);
      }

      return redirect('admin/category')->with('status', 'Category Deleted with its posts Successfully');
    } else {
      return "No Category ID Found";
    }
  }
}
