@extends('layouts.master')

@section('title', 'Category')

@section('content')


 <div class="container-fluid px-4">

                    <div class="card mt-4">
                        <div class="card-header">
                                <h4>Update Category</h4>
                        </div>
                        <div class="card-body">

                            @if($errors->any())
                            <div class="alert alert-danger">
                                 @foreach($errors->all() as $error)
                                <div class="">{{ $error}}</div>
                            @endforeach
                            </div>  
                            @endif

                            <form action=" {{ url('admin/update-category/'.$category->id)}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="form-group mb-3">
                                    <label for="">Category Name</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{ $category->name}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" id="" class="form-control" value="{{ $category->slug}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Description</label>
                                 <textarea name="description" id="mySummernote"  rows="3" class="form-control"> {{ $category->description }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Image</label>
                                    <input type="file" name="image" id="" class="form-control">
                                </div>

                                <h6>SEO Tags</h6>
                                <div class="form-group mb-3">
                                    <label for="">Meta title</label>
                                    <input type="text" name="meta_title" id="" class="form-control" value="{{ $category->meta_title}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Meta description</label>
                                    <input type="text" name="meta_description" id="" class="form-control" value="{{ $category->meta_description}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Meta keyword</label>
                                    <input type="text" name="meta_keyword" id="" class="form-control" value="{{ $category->meta_keyword}}">
                                </div>

                                 <h6>Status Mode</h6>

                                 <div class="row">                            

                                  <div class="form-group col-md-3 mb-3">
                                    <label for="">Navbar Status</label>
                                    <input type="checkbox" name="navbar_status" {{ $category->navbar_status == 1 ? 'checked' : ''}}  >
                                </div>

                                  <div class="form-group col-md-3 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" {{ $category->status == 1 ? 'checked' : ''}}>
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                </div>
                             </div>

                            </form>

                        </div>
                    </div>


              </div>    

    
@endsection