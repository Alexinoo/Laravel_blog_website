@extends('layouts.master')

@section('title', 'Add Post')

@section('content')


 <div class="container-fluid px-4">

    <div class="card mt-2">

        <div class="card-header">
            <h4> Add Posts

                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Posts</a>

            </h4>
        </div>

        <div class="card-body">

            <form action="{{ url('admin/add-post')}}" method="POST">

                <div class="form-group mb-3">
                    <label for=""> Category</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach(  $categories as $category)
                            
                        <option value="{{ $category->id}}">{{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="form-group mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>

                  <div class="form-group mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" id="" class="form-control">
                </div>

                 <div class="form-group mb-3">
                    <label for="">Description</label>
                   <textarea name="description" id=""rows="3" class="form-control"></textarea>
                </div>

                   <div class="form-group mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" id="" class="form-control">
                </div>

                <h4>SEO Tags</h4>
                <div class="form-group mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" id="" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Meta Description</label>
                   <textarea name="meta_description" id="" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="">Meta Keyword</label>
                   <textarea name="meta_keyword" id="" rows="3" class="form-control"></textarea>
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" id="">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save Post</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>

 </div>

 @endsection