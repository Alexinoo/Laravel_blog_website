@extends('layouts.master')

@section('title', 'Add Post')

@section('content')


 <div class="container-fluid px-4">

    <div class="card mt-2">

        <div class="card-header">
            <h4> Edit Posts

                <a href="{{url('admin/posts')}}" class="btn btn-primary float-end">Back</a>

            </h4>
        </div>

        <div class="card-body">
            
              @if($errors->any())
                            <div class="alert alert-danger">
                                 @foreach($errors->all() as $error)
                                <div class="">{{ $error}}</div>
                            @endforeach
                            </div>  
                            @endif

            <form action="{{ url('admin/update-post/'.$post->id)}}" method="POST">
                @csrf
                @method('put')

                <div class="form-group mb-3">
                    <label for=""> Category</label>
                     <select name="category_id" required id="" class="form-control">
                         <option value="">--Select Category--</option>
                        @foreach(  $categories as $category)                            
                        <option value="{{ $category->id}}" {{ $post->category_id == $category->id ? 'selected' : ''}}>
                            {{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="form-group mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{$post->name}}">
                </div>

                  <div class="form-group mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" id="" class="form-control" value="{{$post->slug}}">
                </div>

                 <div class="form-group mb-3">
                    <label for="">Description</label>
                   <textarea name="description" id=""rows="3" class="form-control">{!!  $post->description !!}</textarea>
                </div>

                   <div class="form-group mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" id="" class="form-control" value="{{$post->yt_iframe}}">
                </div>

                <h4>SEO Tags</h4>
                <div class="form-group mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" id="" class="form-control" value="{{$post->meta_title }}">
                </div>
                <div class="form-group mb-3">
                    <label for="">Meta Description</label>
                   <textarea name="meta_description" id="" rows="3" class="form-control">{!!  $post->meta_description !!}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="">Meta Keyword</label>
                   <textarea name="meta_keyword" id="" rows="3" class="form-control">{!!  $post->meta_keyword !!}</textarea>
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" id="" {{ $post->status == 1 ? 'checked' : ''}}>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update Post</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>

 </div>

 @endsection