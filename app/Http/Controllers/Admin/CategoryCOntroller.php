<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

        return view('Admin.Category.index');
    }

    public function create(){

        return view('Admin.Category.create');
    }

    public function store(CategoryFormRequest $request){

        // Fetch validated data
        $data  = $request->validated();

        // Bring in the Model
        $model = new Category;
        
        // Fetch validated data and store
        $model->name = $data['name'];
        $model->slug = $data['slug'];
        $model->description = $data['description'];

        //Slightly different with image - Check if $data has file of type image

        if($data->hasfile('image')){
            // if so store in variable file
            $file = $data->file('image');
            // get file extension
            $filename = time().'.'.$file->getClientOriginalExtension();
            //Use move() to upload the file in the uploads folder
            //Takes 2 parameters - ( location , filename )
            $file->move('uploads/category/' , $filename);
            //Save the filename in the db
            $category->image = $filename;             
        }
        //Get the rest of the fields
          $model->meta_title = $data['meta_title'];
          $model->meta_description = $data['meta_description'];
          $model->meta_keyword = $data['meta_keyword'];

          $model->navbar_status = $data['navbar_status'];
          $model->status = $data['status'];
          $model->created_by = Auth::user()->id;

        //   Save data into table categories
          $model->save();

          return redirect('admin/category')->with('status','Category Added Successfully');
      
    }
}
